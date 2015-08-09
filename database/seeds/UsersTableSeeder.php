<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        App\User::create([
            'name'=>'alex',
            'email'=>'alex@gmail.com',
            'password' => Hash::make('123456'),
            'type'=>'0',
            'location'=>'1',

            ]);

        App\User::create([
            'name'=>'test',
            'email'=>'test@email.com',
            'password' => Hash::make('123456'),
            'type'=>'1',
            'location'=>'1',
            ]);
    }
}
