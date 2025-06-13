<?php

namespace Database\Seeders;

use App\Enums\ArticleStatus;
use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminId = User::query()->where('username', 'admin')->value('id');

        Article::query()->insert([
            [
                'user_id'    => $adminId,
                'title'        => 'Welcome to MyBlog',
                'slug'         => 'welcome-to-myblog',
                'content'      => 'This is the first post on MyBlog. Stay tuned!',
                'status'       => ArticleStatus::PUBLISHED->value,
                'published_at' => now(),
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);
    }
}
