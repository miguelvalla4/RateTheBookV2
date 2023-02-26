<?php

declare(strict_types=1);

namespace App\Infrastructure\Factory;

use App\Domain\Book\Book;
use Exception;

class BookFactory
{
    /** @throws Exception */
    public static function buildFromArray(array $primitiveBook): Book
    {
        return new Book(
            $primitiveBook['id'],
            $primitiveBook['title']
        );
    }
}