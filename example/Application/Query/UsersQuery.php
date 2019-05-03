<?php

declare(strict_types=1);

namespace ZenBox\Ddd\Example\Application\Query;

use ZenBox\Ddd\Application\Query;

final class UsersQuery extends Query
{
    /**
     * @var string|null
     */
    protected $email;

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
}