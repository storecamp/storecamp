<?php

namespace App\Core\Traits;

use App\Core\Models\Counter;
use App\Core\Models\UserCounter;

trait ViewCounterTrait
{
    /**
     * @return mixed
     */
    public function counter()
    {
        $class_name = snake_case(get_class($this));
        $this->counter = Counter::firstOrCreate(['class_name' => $class_name, 'object_id' => $this->id]);

        return $this->counter;
    }

    /**
     * @return mixed
     */
    public function user_counters()
    {
        return $this->hasMany(UserCounter::class, 'object_id')->where('class_name', snake_case(get_class($this)));
    }

    /**
     * @return mixed
     */
    public function get_counters()
    {
        $class = $this->counter();

        return $this->hasMany(get_class($class), 'object_id')->where('class_name', snake_case(get_class($this)))->get();
    }

    /**
     * @param array $get
     * @return mixed
     */
    public function instance_counters($get = ['*'])
    {
        $counters = Counter::where('class_name', '=', snake_case(get_class($this)))->get($get);

        return $counters;
    }

    /**
     * @param $limit
     * @param array $get
     * @return mixed
     */
    public function max_instance_counters($limit = 5, $get = ['*'])
    {
        $counters = Counter::where('class_name', '=', snake_case(get_class($this)))->orderBy('view_counter')->take($limit)->get($get);

        return $counters;
    }

    /**
     * @param $query
     * @param $limit
     * @return mixed
     */
    public function scopeMostViewed($query, $limit)
    {
        $counterIds = $this->max_instance_counters($limit, ['object_id'])->pluck('object_id');
        return $query->whereIn('id', $counterIds)->limit($limit);
    }

    /**
     * Return authentificated users who viewed we know.
     *
     * @return int
     */
    public function view()
    {
        if (! $this->isViewed()) {
            if (\Auth::user()) {
                $this->user_counters()->create([
                    'class_name' => snake_case(get_class($this)),
                    'object_id' => $this->id,
                    'user_id' => \Auth::user()->id,
                    'action' => 'view',
                ]);
                $this->counter()->increment('view_counter');

                return true;
            } else {
                \Session::put($this->get_view_key(), time());
                $this->counter()->increment('view_counter');

                return true;
            }
        }

        return false;
    }

    /**
     * Return views count.
     *
     * @return int
     */
    public function views_count()
    {
        $counter = $this->counter();

        return ($counter->view_counter != null) ? $counter->view_counter : 0;
    }

    /**
     * Is object already viewed by user?
     *
     * @return bool
     */
    public function isViewed()
    {
        if (! \Auth::user()) {
            $viewed = \Session::get($this->get_view_key());
            if (! empty($viewed)) {
                return true;
            }
        } else {
            $user_action = $this->user_counters()
                ->where('action', 'view')
                ->where('class_name', snake_case(get_class($this)))
                ->where('object_id', $this->id)
                ->where('user_id', \Auth::user()->id)->count();
            if ($user_action > 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * get session storage key for view.
     *
     * @return string
     */
    private function get_view_key()
    {
        return 'viewed_'.snake_case(get_class($this)).'_'.$this->id;
    }
}
