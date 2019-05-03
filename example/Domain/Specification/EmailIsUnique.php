<?php

declare(strict_types=1);

namespace ZenBox\Ddd\Example\Domain\Specification;

use ZenBox\Ddd\Domain\Specification;
use ZenBox\Ddd\Example\Domain\Model\Email;
use ZenBox\Ddd\Example\Domain\Repository\UserRepositoryInterface;

final class EmailIsUnique extends Specification
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
     * @param mixed $value
     * @return bool
     */
    public function isSatisfiedBy($value): bool
    {
        assert($value instanceof Email);

        return !(bool)$this->userRepository->findOneByEmail($value->getValue());
    }
}