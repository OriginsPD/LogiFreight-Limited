<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Billing;
use App\Models\Package;

class BillingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Billing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'package_id' => Package::factory(),
            'basic_rate' => $this->faker->randomFloat(2, 0, 999999.99),
            'handler_fee' => $this->faker->randomFloat(2, 0, 999999.99),
            'custom_duties' => $this->faker->randomFloat(2, 0, 999999.99),
            'final_total' => $this->faker->randomFloat(2, 0, 999999.99),
        ];
    }
}
