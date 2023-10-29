<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Member::factory(20)->create()->each(function ($member) {
            Player::factory(rand(10, 20))->create(['member_id' => $member->id]); // 10 matches each player
        });

    }
}

