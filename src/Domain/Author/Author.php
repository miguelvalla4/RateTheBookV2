<?php

declare(strict_types=1);

namespace App\Domain\Author;

class Author {

    public function __construct(string $name, string $lastName)
    {
        $this->name = $name;
        $this->lastName = $lastName;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lastName(): Author
    {
        return $this->lastName;
    }
}