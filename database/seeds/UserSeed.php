<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'AdminName',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
            ]
        );
        $user->assignRole('administrator');

        $admin = User::create([
            'name' => 'UserName',
            'email' => 'user@user.com',
            'password' => bcrypt('password')
            ]
        );
        $admin->assignRole('user');
    }
}
