<?php

declare(strict_types=1);

namespace App\Application\UseCase;

use App\Domain\Author\AuthorRepositoryInterface;

class GetAllAuthorsUseCase
{
    public function __construct(private AuthorRepositoryInterface $authorRepository)
    {
    }

    public function execute(): array
    {
        return $this->authorRepository->getAllAuthors();
    }
}
