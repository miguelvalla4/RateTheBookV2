<?php

declare(strict_types=1);

namespace App\Infrastructure\Factory;

use App\Domain\Book\Book;

class BookFactory
{
    public static function buildFromArray(array $primitiveBook): Book
    {
        $author = AuthorFactory::buildFromArray([
            "author_id" => (int) $primitiveBook['author_id'],
            "author_name" => (string) $primitiveBook['author_name'],
            "last_name" => (string) $primitiveBook['last_name'],
            "nationality" => (string) $primitiveBook['nationality']
        ]);

        $genre = GenreFactory::buildFromArray([
            "genre_id" => (int) $primitiveBook['genre_id'],
            "genre_name" => (string) $primitiveBook['genre_name']
        ]);
        return new Book(
            (int) $primitiveBook['id'],
            (string) $primitiveBook['title'],
            $author,
            $genre,
            (string) $primitiveBook['editorial'],
            (int) $primitiveBook['published_year']
        );
    }
}
