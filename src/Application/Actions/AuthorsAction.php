<?php

declare(strict_types=1);

namespace App\Application\Actions;

use App\Application\UseCase\GetAllAuthorsUseCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class AuthorsAction extends Action
{
    protected GetAllAuthorsUseCase $getAllAuthorsUseCase;

    public function __construct(GetAllAuthorsUseCase $getAllAuthorsUseCase, LoggerInterface $logger)
    {
        $this->getAllAuthorsUseCase = $getAllAuthorsUseCase;
        parent::__construct($logger);
    }

    public function action(): ResponseInterface
    {
        return $this->respondWithData([
            'message' => $this->getAllAuthorsUseCase->execute()
        ]);
    }
}
