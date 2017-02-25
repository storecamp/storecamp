<?php namespace App\Core\Components\Messenger\Traits;

use App\Core\Components\Messenger\Models\Thread;
use App\Core\Components\Messenger\Models\Participant;

trait Messagable
{
    /**
     * Message relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(\App\Core\Components\Messenger\Models\Message::class);
    }

    /**
     * Thread relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function threads()
    {
        return $this->belongsToMany(\App\Core\Components\Messenger\Models\Thread::class, 'participants');
    }

    /**
     * Returns the new messages count for user
     *
     * @return int
     */
    public function newMessagesCount()
    {
        return count($this->threadsWithNewMessages());
    }

    /**
     * Returns all threads with new messages
     *
     * @return array
     */
    public function threadsWithNewMessages()
    {
        $threadsWithNewMessages = [];
        $participants = Participant::where('user_id', $this->id)->pluck('last_read', 'thread_id');

        /**
         * @todo: see if we can fix this more in the future.
         * Illuminate\Foundation is not available through composer, only in laravel/framework which
         * I don't want to include as a dependency for this package...it's overkill. So let's
         * exclude this check in the testing environment.
         */
        if (config('app.env') == 'testing' || !str_contains(\Illuminate\Foundation\Application::VERSION, '5.0')) {
            $participants = $participants->all();
        }

        if ($participants) {
            $threads = Thread::whereIn('id', array_keys($participants))->get();

            foreach ($threads as $thread) {
                if ($thread->updated_at > $participants[$thread->id]) {
                    $threadsWithNewMessages[] = $thread->id;
                }
            }
        }

        return $threadsWithNewMessages;
    }
}
