<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1名のユーザーを作成
        User::factory()->create([
            'email' => 'test@example.com',  // 固定のテスト用メールアドレス
            'password' => bcrypt('Password123!'),  // 固定パスワード
        ]);
    }
}
