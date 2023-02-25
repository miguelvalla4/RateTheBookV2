<?php

declare(strict_types=1);

namespace App\Application\Actions;

use App\Application\UseCase\GetAllBooksUseCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class BooksAction extends Action
{
    protected GetAllBooksUseCase $getAllBooksUseCase;

    public function __construct(GetAllBooksUseCase $getAllBooksUseCase, LoggerInterface $logger)
    {
        $this->getAllBooksUseCase = $getAllBooksUseCase;
        parent::__construct($logger);
    }

    protected function action(): ResponseInterface
    {
        return $this->respondWithData(array(
            'message' => $this->getAllBooksUseCase->execute(),
            'ruta' => __FILE__,
        ));
    }
}