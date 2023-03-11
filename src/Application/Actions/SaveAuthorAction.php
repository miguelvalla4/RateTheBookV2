<?php

declare(strict_types=1);

namespace App\Application\Actions;

use App\Application\UseCase\SaveAuthorUseCase;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class SaveAuthorAction extends Action
{
    protected SaveAuthorUseCase $saveAuthorUseCase;
    public function __construct(SaveAuthorUseCase $saveAuthorUseCase, LoggerInterface $logger)
    {
        $this->saveAuthorUseCase = $saveAuthorUseCase;
        parent::__construct($logger);
    }
    protected function action(): Response
    {
        $data = $this->request->getParsedBody();

        $this->saveAuthorUseCase->execute($data);

        return $this->respondWithData(['message' => 'Author save successfully'])->withStatus(201);
    }
}
