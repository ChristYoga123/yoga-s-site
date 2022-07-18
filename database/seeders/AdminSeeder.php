<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'Christianus Yoga Wibisono',
            'email' => 'adminyoga@gmail.com',
            'password' => 'sehatselalu11'
        ];

        $user['password'] = bcrypt($user['password']);

        \App\Models\User::create($user);
    }
}
