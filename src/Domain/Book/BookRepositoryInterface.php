<?php

declare(strict_types=1);

namespace App\Domain\Books;

interface BookRepositoryInterface
{
    public function getAllBooks(): array;
}