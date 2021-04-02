<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class Driver2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'driver2',
            'password' => bcrypt('passdriver2'),
        ]);
    }
}