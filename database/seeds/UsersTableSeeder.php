<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        App\User::create([
            'name'=>'grkin2002',
            'email'=>'grkin2002@gmail.com',
            'password' => Hash::make('123'),
            'type'=>'0',
            'location'=>'1',

            ]);

        App\User::create([
            'name'=>'testuser',
            'email'=>'testuser@gmail.com',
            'password' => Hash::make('123'),
            'type'=>'1',
            'location'=>'1',
            ]);
    }
}
