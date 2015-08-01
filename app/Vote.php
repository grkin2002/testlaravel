<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['post_id', 'user_id', 'vote_result'];
    public  $timestamps = false;
}
