<?php

declare(strict_types=1);

namespace ZenBox\Ddd\Example\Application\Command;

use ZenBox\Ddd\Application\Command;

final class RegisterUserCommand extends Command
{
    /**
     * @var string|null
     */
    protected $email;
    /**
     * @var string|null
     */
    protected $password;

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }
}