<?php

declare(strict_types=1);

namespace ZenBox\Ddd\Example\Infrastructure\Persistence\InMemory;

use ZenBox\Ddd\Domain\Identifier;
use ZenBox\Ddd\Domain\UuidIdentifier;
use ZenBox\Ddd\Example\Domain\Model\User;
use ZenBox\Ddd\Example\Domain\Repository\UserRepositoryInterface;

final class UserRepository implements UserRepositoryInterface
{
    /**
     * @var array
     */
    private $users;

    public function __construct(array $users = [])
    {
        $this->users = $users;
    }

    /**
     * @return Identifier
     */
    public function nextIdentifier(): Identifier
    {
        return UuidIdentifier::generate();
    }

    /**
     * @param string $email
     * @return User|null
     */
    public function findOneByEmail(string $email): ?User
    {
        if (isset($this->users[$email])) {
            return $this->users[$email];
        }

        return null;
    }

    /**
     * @param User $user
     */
    public function save(User $user): void
    {
        $this->users[$user->getEmail()->getValue()] = $user;
    }
}