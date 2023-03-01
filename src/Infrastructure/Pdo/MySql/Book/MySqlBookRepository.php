<?php

declare(strict_types=1);

namespace App\Infrastructure\Pdo\MySql\Book;

use App\Domain\Book\BookRepositoryInterface;
use App\Infrastructure\Factory\BookFactory;
use PDO;

class MySqlBookRepository implements BookRepositoryInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function getAllBooks(): array
    {
        $sql = <<<SQL
SELECT
        b.id,
        b.title
FROM
        books b
SQL;

        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($result) {
            return BookFactory::buildFromArray($result);
        }, $result);
    }
}
