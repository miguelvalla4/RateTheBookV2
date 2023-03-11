<?php

declare(strict_types=1);

namespace App\Infrastructure\Pdo\MySql\Author;

use App\Domain\Author\Author;
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
        a.id as `author_id`,
        a.name as `author_name`,
        a.last_name,
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

    public function saveAuthor(Author $author): void
    {
        $authorArray = $author->toArray();

        $sql = <<<SQL
INSERT INTO authors (name, last_name, nationality) VALUES (:name, :last_name, :nationality);
SQL;

            $statement = $this->pdo->prepare($sql);

            $statement->bindParam(':name', $authorArray['name']);
            $statement->bindParam(':last_name', $authorArray['lastName']);
            $statement->bindParam(':nationality', $authorArray['nationality']);

            $statement->execute();
    }
}
