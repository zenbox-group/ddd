<?php

declare(strict_types=1);

namespace ZenBox\Ddd\Example\Domain\Repository;

use ZenBox\Ddd\Domain\Identifier;
use ZenBox\Ddd\Example\Domain\Model\User;

interface UserRepositoryInterface
{
    /**
     * @return Identifier
     */
    public function nextIdentifier(): Identifier;

    /**
     * @param string $email
     * @return User|null
     */
    public function findOneByEmail(string $email): ?User;

    /**
     * @param User $user
     */
    public function save(User $user): void;
}