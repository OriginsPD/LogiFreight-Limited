<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 */
	class Billing extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Customs extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Member
 *
 * @property int $id
 * @property int $user_id
 * @property string $member_num
 * @property int $trn
 * @property string $address
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
 */
	class Member extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Package
 *
 * @property int $id
 * @property int $packagetype_id
 * @property int $member_id
 * @property mixed $weight lb
 * @property int $shipper_id
 * @property string $status
 * @property mixed $estimated_cost
 * @property int $internal_tracking
 * @property-read \App\Models\Member $member
 * @property-read \App\Models\PackageType $packagetype
 * @property-read \App\Models\Shipper $shipper
 * @method static \Database\Factories\PackageFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Package newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package query()
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereEstimatedCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereInternalTracking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package wherePackagetypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereShipperId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereWeight($value)
 */
	class Package extends \Eloquent {}
}

namespace App\Models{
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
 */
	class PackageCheckpoint extends \Eloquent {}
}

namespace App\Models{
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
 */
	class PackageType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Shipper
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property int $tracking_no
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Package[] $packages
 * @property-read int|null $packages_count
 * @method static \Database\Factories\ShipperFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipper newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipper newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipper query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipper whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipper whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipper whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipper whereTrackingNo($value)
 */
	class Shipper extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $isAdmin
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

