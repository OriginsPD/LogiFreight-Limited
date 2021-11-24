<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Member;
use App\Models\User;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $memberNum = Str::random(2).random_int(10000,99999);

        return [
            'user_id' => User::factory(),
            'member_num' => $memberNum,
            'trn' => $this->faker->numberBetween(100000000, 999999999),
            'address' => $this->faker->address,
            'mailaddress' => $memberNum." Tillman Plains Quentinland, FL 44091",
        ];
    }
}
