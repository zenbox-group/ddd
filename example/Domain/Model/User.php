<?php

declare(strict_types=1);

namespace ZenBox\Ddd\Example\Domain\Model;

use ZenBox\Ddd\Domain\Identifier;

final class User
{
    /**
     * @var Identifier
     */
    private $id;
    /**
     * @var Email
     */
    private $email;
    /**
     * @var Password
     */
    private $password;

    public function __construct(Identifier $id, Email $email, Password $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return Identifier
     */
    public function getId(): Identifier
    {
        return $this->id;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @return Password
     */
    public function getPassword(): Password
    {
        return $this->password;
    }
}