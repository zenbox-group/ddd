<?php

declare(strict_types=1);

namespace ZenBox\Ddd\Example\Application\Query;

use ZenBox\Ddd\Example\Domain\Model\User;
use ZenBox\Ddd\Example\Domain\Repository\UserRepositoryInterface;

final class UsersQueryHandler
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
     * @param UsersQuery $usersQuery
     * @return User|null
     */
    public function handle(UsersQuery $usersQuery): ?User
    {
        if ($usersQuery->getEmail()) {
            return $this->userRepository->findOneByEmail($usersQuery->getEmail());
        }

        return null;
    }
}