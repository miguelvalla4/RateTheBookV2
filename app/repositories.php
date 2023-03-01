<?php

declare(strict_types=1);

use App\Domain\Book\BookRepositoryInterface;
use App\Infrastructure\Pdo\MySql\Book\MySqlBookRepository;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

return static function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    try {
        $containerBuilder->addDefinitions([
            BookRepositoryInterface::class => function (ContainerInterface $c) {
                return new MySqlBookRepository($c->get(PDO::class));
            }
        ]);
    } catch (Exception $e) {
        return $e->getMessage();
    }

};
