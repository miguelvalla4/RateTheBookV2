<?php

declare(strict_types=1);

namespace App\Domain\Book;

interface BookRepositoryInterface
{
    public function getAllBooks(): array;

    public function getBooksBySaga(): array;
}
