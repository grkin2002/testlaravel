<?php

use Illuminate\Database\Seeder;

class BoardsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('boards')->delete();
        App\Board::create([ 'type'=>'news',
                            'board_name'=>'社区新闻',
                            'board_desc'=>'汇侨新鲜事',
        ]);
        App\Board::create([ 'type'=>'post',
                            'board_name'=>'七嘴八舌',
                            'board_desc'=>'对社区管理提意见',
        ]);

    }
}
