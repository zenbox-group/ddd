<?php

namespace ZenBox\Ddd\Test\Example\Application\Query;

use PHPUnit\Framework\TestCase;
use ZenBox\Ddd\Example\Application\Query\UsersQuery;
use ZenBox\Ddd\Example\Application\Query\UsersQueryHandler;
use ZenBox\Ddd\Example\Domain\Model\Email;
use ZenBox\Ddd\Example\Domain\Model\Password;
use ZenBox\Ddd\Example\Domain\Model\User;
use ZenBox\Ddd\Example\Infrastructure\Persistence\InMemory\UserRepository;

class UsersQueryHandlerTest extends TestCase
{

    public function testHandle()
    {
        $userRepository = new UserRepository();
        $userRepository->save(new User(
            $userRepository->nextIdentifier(),
            new Email('test@test.dev'),
            new Password('pass')
        ));

        $handler = new UsersQueryHandler($userRepository);

        $user = $handler->handle(new UsersQuery(['email' => 'test@test.dev']));

        $this->assertInstanceOf(User::class, $user);
    }
}
