<?php

namespace App\Models;
use App\Enums\ArticleStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'status' => ArticleStatus::class,
        ];
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function titleForUrl(): array|string
    {
        $title = $this->title;
        $title = strtolower($title);
        return Str::replace(' ', '-' ,$title );
    }

    public function isDraft() : bool
    {
        return $this->status === ArticleStatus::DRAFT;
    }

}
