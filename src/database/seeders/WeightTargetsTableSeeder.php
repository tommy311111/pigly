<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WeightTarget;
use App\Models\User;

class WeightTargetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ユーザーを取得（test@example.com で作成されたユーザー）
        $user = User::where('email', 'test@example.com')->first();

        if ($user) {
            // 目標体重を作成
            WeightTarget::factory()->create([
                'user_id' => $user->id,
                'target_weight' => 65.0,  // 固定の目標体重
            ]);
        }
    }
}
