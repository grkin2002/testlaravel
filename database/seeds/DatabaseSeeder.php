<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(BoardsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(RepliesTableSeeder::class);
        $this->call(PhotoTableSeeder::class);


        Model::reguard();
    }
}
