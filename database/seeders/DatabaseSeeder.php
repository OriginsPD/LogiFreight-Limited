<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Billing;
use App\Models\Customs;
use App\Models\Member;
use App\Models\Package;
use App\Models\PackageType;
use App\Models\Shipper;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->state(
            ['isAdmin' => 0],
            ['isAdmin' => 1],
        )->create();
        Member::factory()->count(10)->create();
        Shipper::factory()->count(10)->create();
        PackageType::factory()->count(2)->state(new Sequence(
            ['type' => 'electronics'],
            ['type' => 'clothing'],
        ))->create();
        Package::factory()->count(10)->state(new Sequence(
            ['status' => 'In-Transit'],
            ['status' => 'On-Their-Way-To-Jamaica'],
            ['status' => 'delivered'],
            ['status' => 'warehouse'],
//            ['status' => 'On-Their-Way-To-Jamaica']
        ))->create();
        Customs::factory()->count(10)->create();
        Billing::factory()->count(10)->create();
    }
}
