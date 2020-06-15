<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * Class Post
     *
     * @package App
     * @property string $title
     * @property string $content
     * @property string $category_id
     * @property string $user_id
     */
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id',
    ];
}