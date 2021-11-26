<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shipper
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Package[] $packages
 * @property-read int|null $packages_count
 * @method static \Database\Factories\ShipperFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipper newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipper newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipper query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipper whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipper whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipper whereName($value)
 * @mixin \Eloquent
 */
class Shipper extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function packages()
    {
        return $this->hasMany(\App\Models\Package::class);
    }
}
