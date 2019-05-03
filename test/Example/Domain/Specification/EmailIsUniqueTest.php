<?php

namespace ZenBox\Ddd\Test\Example\Domain\Specification;

use PHPUnit\Framework\TestCase;
use ZenBox\Ddd\Example\Domain\Model\Email;
use ZenBox\Ddd\Example\Domain\Model\Password;
use ZenBox\Ddd\Example\Domain\Model\User;
use ZenBox\Ddd\Example\Domain\Specification\EmailIsUnique;
use ZenBox\Ddd\Example\Infrastructure\Persistence\InMemory\UserRepository;

class EmailIsUniqueTest extends TestCase
{
    public function testIsSatisfiedBy()
    {
        $userRepository = new UserRepository();
        $user = new User(
            $userRepository->nextIdentifier(),
            new Email('test@test.dev'),
            new Password('pass')
        );

        $specification = new EmailIsUnique($userRepository);
        $this->assertTrue($specification->isSatisfiedBy($user->getEmail()));

        $userRepository->save($user);
        $this->assertFalse($specification->isSatisfiedBy($user->getEmail()));
    }
}
