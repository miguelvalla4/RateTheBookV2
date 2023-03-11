<?php

declare(strict_types=1);

use App\Application\Actions\AuthorsAction;
use App\Application\Actions\BooksAction;
use App\Application\Actions\BooksBySagaAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->get('/books', BooksAction::class);
    $app->get('/books{saga}', BooksBySagaAction::class);
    $app->get('/authors', AuthorsAction::class);
};
