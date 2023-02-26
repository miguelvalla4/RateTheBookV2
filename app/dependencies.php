<?php

declare(strict_types=1);

use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $loggerSettings = $settings->get('logger');
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },
        
        PDO::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $databaseSettings = $settings->get('database');
            try {
                return new PDO(
                    'mysql:host=' . $databaseSettings['host'] . ';port=' . $databaseSettings['port'] . ';dbname=' . $databaseSettings['dbname'] . ';charset=utf8mb4',
                    $databaseSettings['user'],
                    $databaseSettings['password']);
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    ]);
};
