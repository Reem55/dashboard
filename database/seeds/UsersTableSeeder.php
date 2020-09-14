<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => bcrypt(123456, $options = []),
            'remember_token' => null,
            'created_at'     => '2019-08-21 05:12:51',
            'updated_at'     => '2019-08-21 05:12:51',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
