<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('posts')->delete();

        $faker= Faker::create('zh_CN');
        $userIds = App\User::lists('id')->all();
        $boardIds = App\Board::lists('id')->all();

        // dd($boardIds);

        foreach(range(1,150) as $index) {
            $post = App\Post::create([
                'board_id'=> $faker->randomElement($boardIds),
                'user_id'=> $faker->randomElement($userIds),
                'post_title'=> $faker->sentence,
                'content'=> $faker->paragraph(40),
                'status'=> $faker->numberBetween(0,1),
                'view_amount'=> $faker->numberBetween(200, 9000),
                'agree_amount'=>$faker->numberBetween(0,100),
                'oppose_amount'=>$faker->numberBetween(0,50),
                'neutral_amount'=>$faker->numberBetween(0,100),
                'deleted_at'=>$faker->optional(0.1)->dateTimeThisYear(),
                'created_at'=>$faker->dateTimeThisYear(),
                'updated_at'=>$faker->dateTimeThisYear(),


                ]);
        }
    }
}
