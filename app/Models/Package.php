<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
