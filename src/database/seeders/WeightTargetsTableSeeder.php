<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WeightTarget;
use App\Models\User;

class WeightTargetsTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::where('email', 'test@example.com')->first();

        if ($user) {
            WeightTarget::factory()->create([
                'user_id' => $user->id,
                'target_weight' => 65.0,
            ]);
        }
    }
}
