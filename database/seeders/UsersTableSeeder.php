<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
           'role' => 'admin',
           'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123'),
            'address' => 'Улица Пушкина',
            'phone' => '77777777777',
        ]);
        User::create([
           'role' => 'user',
           'name' => 'user',
            'email' => 'user@admin.com',
            'password' => Hash::make('123'),
            'address' => 'Улица Лермонтова',
            'phone' => '78888888888',
        ]);
    }
}
