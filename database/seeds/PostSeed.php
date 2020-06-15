<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'test',
            'content' => 'je suis un exemple',
            'user_id' => 1,
            'category_id' => 1,
        ]);
    }
}
