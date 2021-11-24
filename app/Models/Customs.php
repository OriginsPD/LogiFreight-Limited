<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Customs
 *
 * @property int $id
 * @property int $package_id
 * @property-read \App\Models\Package $package
 * @method static \Database\Factories\CustomsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Customs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customs query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customs wherePackageId($value)
 * @mixin \Eloquent
 */
class Customs extends Model
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
        'package_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'package_id' => 'integer',
    ];


    public function package()
    {
        return $this->belongsTo(\App\Models\Package::class);
    }
}
