<?php

declare (strict_types=1);

namespace App\Domain\Book;

use App\Domain\Author;
use App\Domain\Editorial;

class Book {
    public string $tittle;
    public Author $author;
    public Editorial $editorial;

    public function __construct(string $tittle,  string $genre, Author $author, Editorial $editorial)
    {
        $this->tittle = $tittle;
        $this->genre = $genre;
        $this->author = $author;
        $this->editorial = $editorial;
    }

    public function tittle(): string
    {
        return $this->tittle;
    }

    public function genre(): string
    {
        return $this->genre;
    }

    public function author(): Author
    {
        return $this->author;
    }

    public function editorial(): Editorial
    {
        return $this->editorial;
    }
}