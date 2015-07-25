<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use SoftDeletes;

    protected $table = 'replies';
    protected $guarded = ['id'];
    // protected $touches = ['posts'];
    public  $timestamps = true;
    protected $dates = ['deleted_at'];

    public function post()
    {
        return $this->belongsTo('Post', 'post_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('User', 'user_id', 'id');
    }
}
