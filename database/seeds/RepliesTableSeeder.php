<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('replies')->delete();

        $faker = Faker::create('zh_CN');
        $userIds = App\User::lists('id')->all();
        $postIds = App\Post::lists('id')->all();

        foreach( range(1,100) as $index){
            $reply = App\Reply::create([
                'user_id'=>     $faker->randomElement($userIds),
                'post_id'=>     $faker->randomElement($postIds),
                'vote' =>       $faker->numberBetween(0,100),
                'comment'=>     $faker->sentence,
                'deleted_at'=>  $faker->optional(0.1)->dateTimeThisYear(),
                'created_at'=>  $faker->dateTimeThisYear(),
                'updated_at'=>  $faker->dateTimeThisYear(),

                ]);
        }
    }
}
