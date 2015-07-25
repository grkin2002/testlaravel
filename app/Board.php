<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = ['id'];
    public $timestamps = true;

    public function posts()
    {
        return $this->hasMany('Post', 'board_id', 'id');
    }
}
