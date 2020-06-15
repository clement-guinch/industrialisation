<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    /**
     * Class Comment
     *
     * @package App
     * @property string $content
     * @property string $user_id
     * @property string $comment_id
     */
    protected $fillable = [
        'content',
        'user_id',
        'comment_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
