<?php

namespace App\Core\Traits;

use Vinkla\Hashids\Facades\Hashids;

trait GeneratesUnique
{
    /**
     * Boot the trait and register the model events.
     *
     * @return void
     */
    public static function bootGeneratesUnique()
    {
        static::creating(function ($model) {
            $model->{static::$uniqueColumn} = $model->getUnique();
        });
    }

    /**
     * The name of the column to look in for the unique id. You may
     * override this by setting a static $uniqueColumn property on the
     * model that uses this trait.
     *
     * @var string
     */
    public static $uniqueColumn = "unique_id";

    /**
     * Fetch a new unique id.
     *
     * @return string
     */
    public function getUnique()
    {
        $unique = $this->generateUnique();

        if ($this->uniqueExists($unique)) {
            $this->getUnique();
        }

        return $unique;
    }

    /**
     * Checks if the given id already exists on the model.
     *
     * @param  string $unique
     * @return bool
     */
    protected function uniqueExists($unique)
    {
        return count(static::where(static::$uniqueColumn, $unique)->get()) > 0;
    }

    /**
     * Create a new random id.
     *
     * @return string
     */
    protected function generateUnique()
    {
        $seed = $this->makeUniqueSeed();

        return Hashids::encode($seed);
    }

    /**
     * Make a new semi-random seed for the encoder.
     *
     * @return integer
     */
    protected function makeUniqueSeed()
    {
        return random_int(
            random_int(3, 500),
            array_sum(explode('.', microtime(true)))
        );
    }
}