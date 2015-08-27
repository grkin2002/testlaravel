<?php

use \Storage;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->delete();

        $faker = Faker::create('zh_CN');
        $userIds = App\User::lists('id')->all();
        $postIds = App\Post::lists('id')->all();

        $directory = 'photo';
        $files = Storage::files($directory);

        foreach($files as $file){
            $photo = App\Photo::create([
                'user_id'=> $faker->randomElement($userIds),
                'post_id'=>$faker->randomElement($postIds),
                'photo_title'=>$faker->sentence(20),
                'photo_url'=>$file,
            ]);
        }
    }
}
