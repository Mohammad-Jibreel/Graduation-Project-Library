<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'user',
            'username'=>'user25',
            'phone_no'=>'0790232468',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user12345$'),
        ]);
    }
}
