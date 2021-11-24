<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PackageType
 *
 * @property int $id
 * @property string $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Package[] $packages
 * @property-read int|null $packages_count
 * @method static \Database\Factories\PackageTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType whereType($value)
 * @mixin \Eloquent
 */
class PackageType extends Model
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
        'type',
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
