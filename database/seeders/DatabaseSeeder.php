<?php

namespace Database\Seeders;
use App\Entities\User;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'cpf'          => '12345678901',
            'name'         => 'Admin',
            'phone'        => '12345678901',
            'birth'         => '1980-10-01',
            'gender'       => 'm',
            'email'        => 'email@rmail.com',
            'password'     => bcrypt('123456'),
        ]);
    }
}
