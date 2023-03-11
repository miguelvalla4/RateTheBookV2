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
        b.title,
        a.name as `author_name`,
        g.name as `genre_name`,
        b.editorial,
        b.published_year,
        a.id as `author_id`,
        g.id as `genre_id`,
        a.last_name,
        a.nationality,
        b.saga
FROM
        books b 
            INNER JOIN authors a ON b.author_id = a.id
            INNER JOIN genres g ON b.genre_id = g.id
SQL;

        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($result) {
            return BookFactory::buildFromArray($result);
        }, $result);
    }

    public function getBooksBySaga(string $saga): array
    {
        $sql = <<<SQL
SELECT
        b.id,
        b.title,
        a.name as `author_name`,
        g.name as `genre_name`,
        b.editorial,
        b.published_year,
        a.id as `author_id`,
        g.id as `genre_id`,
        a.last_name,
        a.nationality,
        b.saga
FROM
        books b 
            INNER JOIN authors a ON b.author_id = a.id
            INNER JOIN genres g ON b.genre_id = g.id
WHERE b.saga = :saga
SQL;

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':saga', $saga);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($result) {
            return BookFactory::buildFromArray($result);
        }, $result);
    }
}
