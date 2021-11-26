<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Billing
 *
 * @property int $id
 * @property int $package_id
 * @property mixed $basic_rate
 * @property mixed|null $handler_fee
 * @property mixed|null $custom_duties
 * @property mixed|null $final_total
 * @property-read \App\Models\Package $package
 * @method static \Database\Factories\BillingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Billing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Billing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Billing query()
 * @method static \Illuminate\Database\Eloquent\Builder|Billing whereBasicRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Billing whereCustomDuties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Billing whereFinalTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Billing whereHandlerFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Billing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Billing wherePackageId($value)
 * @mixin \Eloquent
 */
class Billing extends Model
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
        'basic_rate',
        'handler_fee',
        'custom_duties',
        'final_total',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'package_id' => 'integer',
        'basic_rate' => 'decimal:2',
        'handler_fee' => 'decimal:2',
        'custom_duties' => 'decimal:2',
        'final_total' => 'decimal:2',
    ];


    public function package()
    {
        return $this->belongsTo(\App\Models\Package::class);
    }
}
