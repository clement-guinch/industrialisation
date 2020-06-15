<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Class Post
     *
     * @package App
     * @property string $name
     */
    protected $fillable = [
        'name',
    ];
}
