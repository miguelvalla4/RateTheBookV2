<?php

declare(strict_types=1);

namespace App\Infrastructure\Pdo\MySql\Author;

use App\Domain\Author\AuthorRepositoryInterface;
use App\Infrastructure\Factory\AuthorFactory;
use PDO;

class MySqlAuthorRepository implements AuthorRepositoryInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function getAllAuthors(): array
    {
        $sql = <<<SQL
SELECT
        a.id,
        a.name,
        a.lastName,
        a.nationality
FROM
        authors a
SQL;

        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($result) {
            return AuthorFactory::buildFromArray($result);
        }, $result);
    }
}
