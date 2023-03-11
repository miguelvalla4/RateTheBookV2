<?php

declare(strict_types=1);

namespace App\Application\Actions;

use App\Application\UseCase\GetBooksBySagaUseCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class BooksBySagaAction extends Action
{
    protected GetBooksBySagaUseCase $getBooksBySagaUseCase;

    public function __construct(GetBooksBySagaUseCase $getBooksBySagaUseCase, LoggerInterface $logger)
    {
        $this->getBooksBySagaUseCase = $getBooksBySagaUseCase;
        parent::__construct($logger);
    }

    protected function action(): ResponseInterface
    {
        return $this->respondWithData([
            'content' => $this->getBooksBySagaUseCase->execute($this->getSaga())
        ]);
    }

    protected function getSaga(): string
    {
        return (string) $this->request->getAttribute('saga');
    }
}
