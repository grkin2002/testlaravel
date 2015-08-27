<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable =['user_id', 'post_id', 'photo_title','photo_url'];

    protected $dates = ['deleted_at'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }
}
