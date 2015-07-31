<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable =['post_title', 'content', 'board_id','user_id'];

    protected $dates = ['deleted_at'];
    public $timestamps = true;

    public function replies()
    {
        return $this->hasMany('App\Reply', 'post_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function board()
    {
        return $this->belongsTo('App\Board', 'board_id', 'id');
    }

    /**
     * Attribute Accessor
     */

    public function getPostTitleAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Attribute Mutator
     */

    public function setPostTitleAttribute($value)
    {
        $this->attributes['post_title'] = strtolower($value)."......";
    }
}
