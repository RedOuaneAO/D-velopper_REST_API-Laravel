<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name'=>'mohammed Moussafia',
            'role'=>'1',
            'email'=>'moussafia.mohammed1999@gmail.com',
            'password'=>Hash::make('123456')

        ]);
    }
}
