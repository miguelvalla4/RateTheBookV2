<?php

declare(strict_types=1);

use App\Application\Actions\AuthorsAction;
use App\Application\Actions\BooksAction;
use App\Application\Actions\BooksBySagaAction;
use App\Application\Actions\SaveAuthorAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/books', function (Group $group) {
        $group->get('', BooksAction::class);
        $group->get('{saga}', BooksBySagaAction::class);
    });

    $app->group('/author', function (Group $group) {
        $group->get('', AuthorsAction::class);
        $group->post('', SaveAuthorAction::class);
    });
};
