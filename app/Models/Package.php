<?php

namespace App\Models;

use Database\Factories\PackageFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\Package
 *
 * @property int $id
 * @property int $packagetype_id
 * @property int $member_id
 * @property mixed $weight lb
 * @property int $shipper_id
 * @property string $status
 * @property mixed|null $estimated_cost
 * @property int|null $internal_tracking
 * @property int $expected_date
 * @property int $arrival_date
 * @property int $created_at
 * @property-read Member $member
 * @property-read Packagetype $packagetype
 * @property-read Shipper $shipper
 * @method static PackageFactory factory(...$parameters)
 * @method static Builder|Package newModelQuery()
 * @method static Builder|Package newQuery()
 * @method static Builder|Package query()
 * @method static Builder|Package whereArrivalDate($value)
 * @method static Builder|Package whereCreatedAt($value)
 * @method static Builder|Package whereEstimatedCost($value)
 * @method static Builder|Package whereExpectedDate($value)
 * @method static Builder|Package whereId($value)
 * @method static Builder|Package whereInternalTracking($value)
 * @method static Builder|Package whereMemberId($value)
 * @method static Builder|Package wherePackagetypeId($value)
 * @method static Builder|Package whereShipperId($value)
 * @method static Builder|Package whereStatus($value)
 * @method static Builder|Package whereWeight($value)
 * @mixin Eloquent
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
        'invoice',
        'actually_cost',
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
        'created_at' => 'timestamp',
    ];


    public function packagetype()
    {
        return $this->belongsTo(Packagetype::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
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
