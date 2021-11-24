<?php

namespace App\Models;

use Database\Factories\MemberFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Member
 *
 * @property int $id
 * @property int $user_id
 * @property string $member_num
 * @property int $trn
 * @property string $address
 * @property string|null $mailaddress
 * @property-read Collection|Package[] $packages
 * @property-read int|null $packages_count
 * @property-read User $user
 * @method static MemberFactory factory(...$parameters)
 * @method static Builder|Member newModelQuery()
 * @method static Builder|Member newQuery()
 * @method static Builder|Member query()
 * @method static Builder|Member whereAddress($value)
 * @method static Builder|Member whereId($value)
 * @method static Builder|Member whereMailaddress($value)
 * @method static Builder|Member whereMemberNum($value)
 * @method static Builder|Member whereTrn($value)
 * @method static Builder|Member whereUserId($value)
 * @mixin Eloquent
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
        return $this->hasMany(Package::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
