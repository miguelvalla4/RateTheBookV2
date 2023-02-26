<?php

declare(strict_types=1);

namespace App\Application\UseCase;

use App\Domain\Book\BookRepositoryInterface;

class GetAllBooksUseCase
{
    private BookRepositoryInterface $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function execute(): array
    {
        return $this->bookRepository->getAllBooks();
    }
}