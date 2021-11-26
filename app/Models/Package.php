<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\Package
 *
 * @property int $id
 * @property int $packagetype_id
 * @property int $member_id
 * @property string $weight lb
 * @property int $shipper_id
 * @property string $status
 * @property string $tracking_no
 * @property string|null $estimated_cost
 * @property string|null $actually_cost
 * @property string|null $invoice
 * @property string|null $internal_tracking
 * @property string|null $expected_date
 * @property string|null $arrival_date
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \App\Models\Member $member
 * @property-read \App\Models\PackageType $packagetype
 * @property-read \App\Models\Shipper $shipper
 * @method static \Database\Factories\PackageFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Package newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package query()
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereActuallyCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereArrivalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereEstimatedCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereExpectedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereInternalTracking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package wherePackagetypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereShipperId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereTrackingNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereWeight($value)
 * @mixin \Eloquent
 */
class Package extends Model
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
        'packagetype_id',
        'member_id',
        'weight',
        'shipper_id',
        'status',
        'tracking_no',
        'estimated_cost',
        'actually_cost',
        'invoice',
        'internal_tracking',
        'expected_date',
        'arrival_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'packagetype_id' => 'integer',
        'member_id' => 'integer',
        'shipper_id' => 'integer',
        'created_at' => 'datetime',
    ];


    public function packagetype()
    {
        return $this->belongsTo(Packagetype::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class)->with('user');
    }

    public function shipper()
    {
        return $this->belongsTo(Shipper::class);
    }

    public function invoiceUrl(): string
    {
        return $this->invoice
            ? Storage::disk('invoicePhoto')->url($this->invoice)
            : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($this->email)));
    }
}
