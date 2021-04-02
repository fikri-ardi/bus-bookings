<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class Driver1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'driver1',
            'password' => bcrypt('passdriver1'),
        ]);
    }
}