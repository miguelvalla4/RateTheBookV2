<?php

declare(strict_types=1);

namespace App\Domain\Author;

interface AuthorRepositoryInterface
{
    public function getAllAuthors(): array;

    public function saveAuthor(Author $author): void;
}
