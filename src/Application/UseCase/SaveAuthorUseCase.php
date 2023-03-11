<?php

declare(strict_types=1);

namespace App\Application\UseCase;

use App\Domain\Author\AuthorRepositoryInterface;
use App\Infrastructure\Factory\AuthorFactory;

class SaveAuthorUseCase
{
    public function __construct(private AuthorRepositoryInterface $authorRepository)
    {
    }

    public function execute(array $primitiveAuthor): void
    {
        $author = AuthorFactory::buildFromArrayToPersist($primitiveAuthor);

        $this->authorRepository->saveAuthor($author);
    }
}
