<?php

namespace App\Core\Models;

use App\Core\Contracts\CartInterface;
use App\Core\Traits\CalculationsTrait;
use App\Core\Traits\GeneratesUnique;
use Illuminate\Database\Eloquent\Model;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

class Cart extends Model implements Transformable, CartInterface
{
    use TransformableTrait;
    use GeneratesUnique;

    protected $table;
    protected $casts = [
        'content' => 'json'
    ];
    protected $fillable = ['id', 'unique_id', 'instance', 'content'];

    /**
     * Cart constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('shop.cart_table');
    }

    public static function boot()
    {
        parent::boot();
    }
}
