<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name'      =>  'Administrator',
                'username'  =>  'admin',
                'email'     =>  'metalabmetadata@gmail.com',
                'password'  =>  bcrypt('Metadata25'),
                'level'     =>  1
            ],
            [
                'name'      =>  'Operator',
                'username'  =>  'operator',
                'email'     =>  'operator@gmail.com',
                'password'  =>  bcrypt('12345678'),
                'level'     =>  2
            ],
            [
                'name'      =>  'Kontributor',
                'username'  =>  'kontributor',
                'email'     =>  'kontributor@gmail.com',
                'password'  =>  bcrypt('12345678'),
                'level'     =>  3
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
