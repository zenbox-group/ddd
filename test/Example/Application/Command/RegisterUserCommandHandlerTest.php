<?php

namespace ZenBox\Ddd\Test\Example\Application\Command;

use PHPUnit\Framework\TestCase;
use ZenBox\Ddd\Domain\Identifier;
use ZenBox\Ddd\Example\Application\Command\RegisterUserCommand;
use ZenBox\Ddd\Example\Application\Command\RegisterUserCommandHandler;
use ZenBox\Ddd\Example\Infrastructure\Persistence\InMemory\UserRepository;

class RegisterUserCommandHandlerTest extends TestCase
{

    public function testHandle()
    {
        $userRepository = new UserRepository();

        $handler = new RegisterUserCommandHandler($userRepository);
        $identifier = $handler->handle(new RegisterUserCommand([
            'email' => 'test@test.dev',
            'password' => 'pass'
        ]));

        $this->assertInstanceOf(Identifier::class, $identifier);
    }
}
