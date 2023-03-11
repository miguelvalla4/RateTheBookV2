<?php

declare(strict_types=1);

namespace App\Application\UseCase;

use App\Domain\Book\BookRepositoryInterface;

class GetBooksBySagaUseCase
{
    public function __construct(private BookRepositoryInterface $bookRepository)
    {
    }

    public function execute(string $saga): array
    {
        return $this->bookRepository->getBooksBySaga($saga);
    }
}
