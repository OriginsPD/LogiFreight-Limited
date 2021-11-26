<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
