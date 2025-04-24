<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\WeightLog;
use App\Models\User;

class WeightLogsTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::where('email', 'test@example.com')->first();

        if ($user) {
            $weight = 70.0;
            $plateauStart = rand(10, 20);
            $plateauLength = rand(3, 7);

            for ($i = 0; $i < 35; $i++) {
                $date = Carbon::today()->subDays(34 - $i);

                if ($i >= $plateauStart && $i < $plateauStart + $plateauLength) {
                    $weight += mt_rand(-5, 5) / 100;
                } else {
                    $weight -= mt_rand(5, 10) / 100;
                }

                $roundedWeight = round($weight, 1);

                WeightLog::factory()->create([
                    'user_id' => $user->id,
                    'date' => $date,
                    'weight' => $roundedWeight,
                ]);
            }
        }
    }
}
