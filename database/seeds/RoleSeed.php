<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = Role::create(['name' => 'administrator']);
        $administrator->givePermissionTo('users_manage');
        $administrator->givePermissionTo('posts_manage');
        $administrator->givePermissionTo('comments');


        $user = Role::create([
            'name' => 'user',
            'guard_name' => 'user',
        ]);
        $user->givePermissionTo('comments');
    }
}
