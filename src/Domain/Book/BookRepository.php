<?php

declare(strict_types=1);

namespace App\Domain\Books;

interface BookRepository
{
    public function getBooks(): array;
}