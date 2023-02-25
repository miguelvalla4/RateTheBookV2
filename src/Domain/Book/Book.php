<?php

declare(strict_types=1);

namespace App\Domain\Books;

use JsonSerializable;

class Book implements JsonSerializable
{
    protected int $id;
    protected string $title;

    public function __construct(int $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id(),
            "title" => $this->title()
        ];
    }
}