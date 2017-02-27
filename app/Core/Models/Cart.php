<?php

namespace App\Core\Models;

use App\Core\Contracts\CartInterface;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\CalculationsTrait;
use App\Core\Traits\GeneratesUnique;
use App\Core\Base\Model;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

class Cart extends Model implements Transformable, CartInterface
{
    use TransformableTrait;
    use GeneratesUnique;
    use CacheableEloquent;

    protected $table;
    protected $casts = [
        'content' => 'array'
    ];
    protected $fillable = ['instance', 'content'];

    /**
     * Cart constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('sales.cart_table');
    }

    public static function boot()
    {
        parent::boot();
    }
}
