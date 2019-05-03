<?php

declare(strict_types=1);

namespace ZenBox\Ddd\Test\Application;

use ZenBox\Ddd\Application\Command;

final class TestCommand extends Command
{
    /**
     * @var string|null
     */
    protected $string;
    /**
     * @var int|null
     */
    protected $int;
    /**
     * @var float|null
     */
    protected $float;
    /**
     * @var bool|null
     */
    protected $bool;
    /**
     * @var array|null
     */
    protected $array;
    /**
     * @var string
     */
    protected $camelCase;

    /**
     * @return string|null
     */
    public function getString(): ?string
    {
        return $this->string;
    }

    /**
     * @return int|null
     */
    public function getInt(): ?int
    {
        return $this->int;
    }

    /**
     * @return float|null
     */
    public function getFloat(): ?float
    {
        return $this->float;
    }

    /**
     * @return bool|null
     */
    public function getBool(): ?bool
    {
        return $this->bool;
    }

    /**
     * @return array|null
     */
    public function getArray(): ?array
    {
        return $this->array;
    }

    /**
     * @return string
     */
    public function getCamelCase(): string
    {
        return $this->camelCase;
    }
}