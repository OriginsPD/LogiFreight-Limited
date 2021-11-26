<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Member;
use App\Models\Package;
use App\Models\Packagetype;
use App\Models\Shipper;

class PackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Package::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'packagetype_id' => Packagetype::factory(),
            'member_id' => Member::factory(),
            'weight' => $this->faker->randomFloat(2, 0, 999999.99),
            'shipper_id' => Shipper::factory(),
            'status' => $this->faker->word,
            'tracking_no' => $this->faker->numberBetween(10000, 99999),
            'estimated_cost' => $this->faker->randomFloat(2, 0, 999999.99),
            'actually_cost' => $this->faker->randomFloat(2, 0, 999999.99),
            'invoice' => $this->faker->word,
            'internal_tracking' => $this->faker->numberBetween(10000, 99999),
            'expected_date' => $this->faker->dateTimeThisYear(),
            'arrival_date' => $this->faker->dateTimeThisYear(),
            'created_at' => $this->faker->dateTime(),
        ];
    }
}
