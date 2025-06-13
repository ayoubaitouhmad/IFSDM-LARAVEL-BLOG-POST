<?php

namespace App\Enums;

use function Laravel\Prompts\select;

enum OrderBy: int
{
    case TITLE = 1;
    case AUTHOR = 2;
    case PUBLISHED_AT = 3;

    public function text()
    {
        return match ($this) {
            self::TITLE => "Title",
            self::AUTHOR => "Author",
            self::PUBLISHED_AT => "Published at",
        };
    }
    public function coulumn()
    {
        return match ($this) {
            self::TITLE => "title",
            self::AUTHOR => "user_id",
            self::PUBLISHED_AT => "published_at",
        };
    }


    public static function toArray()
    {
        return [
            self::TITLE->value => self::TITLE->text(),
            self::AUTHOR->value => self::AUTHOR->text(),
            self::PUBLISHED_AT->value => self::PUBLISHED_AT->text(),
        ];
    }
}
