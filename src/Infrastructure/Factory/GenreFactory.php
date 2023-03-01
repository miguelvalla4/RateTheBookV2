<?php

declare(strict_types=1);

namespace App\Infrastructure\Factory;

use App\Domain\Genre\Genre;

class GenreFactory
{
    public static function buildFromArray(array $primitiveGenre): Genre
    {
        return new Genre(
            (int) $primitiveGenre['genre_id'],
            (string) $primitiveGenre['genre_name']
        );
    }
}
