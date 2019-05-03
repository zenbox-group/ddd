<?php

declare(strict_types=1);

namespace ZenBox\Ddd\Example\Application\Command;

use Assert\Assert;
use ZenBox\Ddd\Domain\Identifier;
use ZenBox\Ddd\Example\Domain\Model\Email;
use ZenBox\Ddd\Example\Domain\Model\Password;
use ZenBox\Ddd\Example\Domain\Model\User;
use ZenBox\Ddd\Example\Domain\Repository\UserRepositoryInterface;
use ZenBox\Ddd\Example\Domain\Specification\EmailIsUnique;

final class RegisterUserCommandHandler
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param RegisterUserCommand $command
     * @return Identifier
     */
    public function handle(RegisterUserCommand $command): Identifier
    {
        Assert::lazy()
            ->that($command->getEmail(), 'email')->notEmpty('Email is empty')
            ->that($command->getPassword(), 'password')->notEmpty('Password is empty')
            ->verifyNow();

        $email = new Email($command->getEmail());
        $password = new Password($command->getPassword());

        Assert::lazy()
            ->that($email, 'email')
            ->satisfy(new EmailIsUnique($this->userRepository), $email->getValue() . ' is already registered');

        $user = new User($this->userRepository->nextIdentifier(), $email, $password);

        $this->userRepository->save($user);

        return $user->getId();
    }
}