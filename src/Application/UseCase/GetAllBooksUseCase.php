<?php

declare(strict_types=1);

namespace App\Application\UseCase;

use App\Domain\Book\BookRepositoryInterface;

class GetAllBooksUseCase
{
    public function __construct(private BookRepositoryInterface $bookRepository)
    {
    }

    public function execute(): array
    {
        return $this->bookRepository->getAllBooks();
    }
}