<?php

declare(strict_types=1);

namespace App\Domain\Book;

use App\Domain\Author\Author;
use App\Domain\Genre\Genre;
use JsonSerializable;
use phpDocumentor\Reflection\Utils;

class Book implements JsonSerializable
{
    protected int $id;
    protected string $title;
    protected Author $author;
    protected Genre $genre;
    protected string $editorial;
    protected int $publishedYear;
    protected ?string $saga;

    public function __construct(
        int $id,
        string $title,
        Author $author,
        Genre $genre,
        string $editorial,
        int $publishedYear,
        ?string $saga
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->genre = $genre;
        $this->editorial = $editorial;
        $this->publishedYear = $publishedYear;
        $this->saga = $saga;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function author(): Author
    {
        return $this->author;
    }

    public function genre(): Genre
    {
        return $this->genre;
    }

    public function editorial(): string
    {
        return $this->editorial;
    }

    public function publishedYear(): int
    {
        return $this->publishedYear;
    }

    public function saga(): ?string
    {
        return $this->saga;
    }
    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id(),
            "title" => $this->title(),
            "author" => $this->author->name() . " " . $this->author->lastName(),
            "genre" => $this->genre->name(),
            "editorial" => $this->editorial(),
            "published_year" => $this->publishedYear(),
            "saga" => $this->saga() ?? 'Novela única'
        ];
    }
}
