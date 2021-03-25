<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
            'name' => 'irvan',
            'email' => 'irvanrifqi5@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),

        ]);
    }
}
