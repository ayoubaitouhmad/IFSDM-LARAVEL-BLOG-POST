<?php

namespace App\Enums;

use function Laravel\Prompts\select;

enum ArticleStatus: int
{
    case PUBLISHED = 1;
    case DRAFT = 2;


    public function text()
    {
        return match ($this) {
            self::PUBLISHED => "published",
            self::DRAFT => "draft",

        };
    }


    public static function toArray()
    {
        return [
            self::PUBLISHED->value => self::PUBLISHED->text(),
            self::DRAFT->value => self::DRAFT->text(),
        ];
    }
}
