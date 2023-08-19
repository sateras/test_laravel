<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'test',
                'email' => 'test@mail.ru',
                'password' => Hash::make('123'),
                'email_verified_at' => now(),
            ],
        ];

        foreach ($data as $column) {
            User::create($column);
        }
    }
}
