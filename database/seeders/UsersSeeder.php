<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => bcrypt('password'),
                'dob' => '1990-05-10',
                'avatar' => 'https://i.pravatar.cc/150?img=1',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => bcrypt('password'),
                'dob' => '1985-09-21',
                'avatar' => 'https://i.pravatar.cc/150?img=2',
            ],
        ];

        foreach ($data as $item) {
            User::updateOrCreate(['email' => $item['email']], $item);
        }
    }
}
