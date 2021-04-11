<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static paginate(int $int)
 * @method static availableProducts()
 * @method static create(array $all)
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_AVAILABLE = 'available';
    const STATUS_UNAVAILABLE = 'unavailable';

    const STATUSES = [
        self::STATUS_AVAILABLE,
        self::STATUS_UNAVAILABLE
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'art', 'name', 'status', 'data'
    ];

    protected $casts = [
        'data' => 'array'
    ];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeAvailableProducts($query)
    {
        return $query->where('status', self::STATUS_AVAILABLE);
    }
}
