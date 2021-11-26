<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Member
 *
 * @property int $id
 * @property int $user_id
 * @property string $member_num
 * @property int|null $trn
 * @property string|null $address
 * @property string|null $mailaddress
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Package[] $packages
 * @property-read int|null $packages_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\MemberFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Member newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member query()
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereMailaddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereMemberNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereTrn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereUserId($value)
 * @mixin \Eloquent
 */
class Member extends Model
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
        'user_id',
        'member_num',
        'trn',
        'address',
        'mailaddress',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];


    public function packages()
    {
        return $this->hasMany(\App\Models\Package::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
