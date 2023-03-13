<?php

declare(strict_types=1);

namespace Tests\Application\UseCase;

use _PHPStan_eb00fd21c\Nette\Neon\Exception;
use App\Application\UseCase\GetAllAuthorsUseCase;
use App\Domain\Author\AuthorRepositoryInterface;
use PHPUnit\Framework\TestCase;
use Tests\Application\MotherObjects\AuthorsMotherObject;

class GetAllAuthorsUseCaseTest extends TestCase
{
    private const GET_ALL_AUTHORS = 'getAllAuthors';

    public function testGivenValidWhenExistsAuthorsThenReturnAuthors(): void
    {
        //given
        $authors = AuthorsMotherObject::buildAllAuthors();

        $sut = $this->createMock(AuthorRepositoryInterface::class);
        $sut
            ->expects(self::once())
            ->method(self::GET_ALL_AUTHORS)
            ->willReturn($authors);

        //when
        $expected = new GetAllAuthorsUseCase($sut);

        //then
        self::assertEquals($expected->execute(), $authors);
    }
}
