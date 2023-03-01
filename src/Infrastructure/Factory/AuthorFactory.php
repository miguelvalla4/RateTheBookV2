<?php

declare(strict_types=1);

namespace App\Infrastructure\Factory;

use App\Domain\Author\Author;

class AuthorFactory
{
    public static function buildFromArray(array $primitiveAuthor): Author
    {
        return new Author(
            (int) $primitiveAuthor['author_id'],
            (string) $primitiveAuthor['author_name'],
            (string) $primitiveAuthor['last_name'],
            (string) $primitiveAuthor['nationality']
        );
    }
}
