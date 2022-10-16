<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'role'=>'1',
                'password'=> bcrypt('admin123'),
            ],
            [
                'name'=>'User',
                'email'=>'user@gmail.com',
                'role'=>'0',
                'password'=> bcrypt('user123'),
            ],
            [
                'name'=>'Livreur',
                'email'=>'livreur@gmail.com',
                'role'=>'2',
                'password'=> bcrypt('livreur123'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
