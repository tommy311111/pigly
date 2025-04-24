<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        UsersTableSeeder::class,
        WeightLogsTableSeeder::class,
        WeightTargetsTableSeeder::class,
    ]);
    }
}
