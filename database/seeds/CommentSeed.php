<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'id' => 1,
                'content' => 'lorem ipsum dolor sit amet',
                'user_id' => 1,
                'comment_id' => null,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'content' => 'lorem ipsum dolor sit amet',
                'user_id' => 2,
                'comment_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'content' => 'lorem ipsum dolor sit amet',
                'user_id' => 1,
                'comment_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'content' => 'lorem ipsum dolor sit amet',
                'user_id' => 2,
                'comment_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'content' => 'lorem ipsum dolor sit amet',
                'user_id' => 2,
                'comment_id' => null,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'content' => 'lorem ipsum dolor sit amet',
                'user_id' => 2,
                'comment_id' => null,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'content' => 'lorem ipsum dolor sit amet',
                'user_id' => 2,
                'comment_id' => 6,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
