<?php

declare(strict_types=1);

namespace App\Domain\Author;

use JsonSerializable;

class Author implements JsonSerializable
{
    protected int $id;
    protected string $name;
    protected string $lastName;
    protected string $nationality;

    public function __construct(int $id, string $name, string $lastName, string $nationality)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->nationality = $nationality;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function nationality(): string
    {
        return $this->nationality;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id(),
            "name" => $this->name(),
            "lastName" => $this->lastName(),
            "nationality" => $this->nationality()
        ];
    }
}
