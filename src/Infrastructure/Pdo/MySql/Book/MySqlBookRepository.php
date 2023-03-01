<?php

declare(strict_types=1);

namespace App\Infrastructure\Pdo\MySql\Book;

use App\Domain\Book\BookRepositoryInterface;
use App\Infrastructure\Factory\BookFactory;
use Exception;
use PDO;

class MySqlBookRepository implements BookRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
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

        /** @throws Exception */
        return array_map(function ($result) {
            return BookFactory::buildFromArray($result);
        }, $result);
    }
}
