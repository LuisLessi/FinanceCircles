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
            'cpf'          => '12345678801',
            'name'         => 'Admin',
            'phone'        => '12345678901',
            'birth'         => '1980-10-01',
            'gender'       => 'm',
            'email'        => 'emaill@rmail.com',
            'password'     => env('PASSWORD_HASH') ? bcrypt('123456') : '123456',
        ]);
    }
}
