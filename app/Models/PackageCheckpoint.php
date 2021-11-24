<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PackageCheckpoint
 *
 * @property int $id
 * @property int $package_id
 * @property \Illuminate\Support\Carbon $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Package $package
 * @method static \Database\Factories\PackageCheckpointFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageCheckpoint newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageCheckpoint newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageCheckpoint query()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageCheckpoint whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageCheckpoint whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageCheckpoint whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageCheckpoint wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageCheckpoint whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PackageCheckpoint extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'package_id',
        'date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'package_id' => 'integer',
        'date' => 'date',
    ];


    public function package()
    {
        return $this->belongsTo(\App\Models\Package::class);
    }
}
