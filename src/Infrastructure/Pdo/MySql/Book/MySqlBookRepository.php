<?php

declare(strict_types=1);

namespace App\Infrastructure\Pdo\MySql\Book;

use App\Domain\Book\BookRepository;

class MySqlBookRepository extends BookRepository
{
    private PDO $pdo;
}