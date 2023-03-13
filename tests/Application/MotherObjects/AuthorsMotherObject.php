<?php

declare(strict_types=1);

namespace Tests\Application\MotherObjects;

class AuthorsMotherObject
{
    public static function buildAllAuthors(): array
    {
        return [
                [
                    "id" => 1,
                    "name" => "Javier",
                    "lastName" => "Sierra",
                    "nationality" => "EspaÃ±a"
                ],
                [
                    "id" => 2,
                    "name" => "Brandon",
                    "lastName" => "Sanderson",
                    "nationality" => "EEUU"
                ],
                [
                    "id" => 3,
                    "name" => "Jean Marie",
                    "lastName" => "Auel",
                    "nationality" => "EEUU"
                ],
                [
                    "id" => 4,
                    "name" => "Isabel",
                    "lastName" => "Allende",
                    "nationality" => "EspaÃ±a"
                ],
            ];
    }
}
