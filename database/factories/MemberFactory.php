<?php

namespace Database\Factories;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Member::class;
    public function definition(): array
    {

        return [

            'first_name'   => $this->faker->name(),
            'last_name'    =>  $this->faker->name(),
            'phone'        => $this->faker->phoneNumber,
            'street'       => $this->faker->streetAddress,
            'city'         => $this->faker->city,
            'state'        => $this->faker->state,
            'zip_code'     => $this->faker->postcode,
            'country'      => $this->faker->country,
            'email'        => $this->faker->unique()->safeEmail(),

        ];
    }
}
