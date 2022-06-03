<?php

namespace Database\Seeders;

use App\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
        'name' => 'Admin',
        'username'=>'admin25',
        'phone_no'=>'0788307467',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('admin12345$'),
        ]);


    }
}
