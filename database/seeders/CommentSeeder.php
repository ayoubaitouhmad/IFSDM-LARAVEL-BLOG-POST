<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postId =  Article::query()->first()->value('id');
        $userId =  User::query()->first()->value('id');

        Comment::query()->insert([
            [
                'article_id'    => $postId,
                'user_id'=> $userId,
                'content'    => 'Great first post!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
