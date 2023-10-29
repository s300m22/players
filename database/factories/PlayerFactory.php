<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\Player;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Player::class;
    public function definition(): array
    {
        $score = $this->faker->numberBetween(0, 100);
        return [

                'win_or_loss'  => $score > 50 ? 'win' : 'loss' ,
                'score'        => $score ,
                'match_date'   => $this->faker->date,
                'against'      => $this->faker->name,
                'location'     => $this->faker->city,
                'member_id'    => Member::factory(),
        ];
    }
}
