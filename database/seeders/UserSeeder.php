<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin12345'),
            'nom' => 'Arrouchi',
            'prenom' => 'Hassan',
            'nomar' => 'عروشي',
            'prenomar' => 'حسن',
            'telephone' => '0662467704',
            'image' => 'ARROUCHI.jpg',
            'role'=>User::ADMIN_ROLE ,
            'status' => User::ACTIVE_STATUS,
        ]);
    }
}
