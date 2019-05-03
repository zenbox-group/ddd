<?php

namespace ZenBox\Ddd\Test\Application;

use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{

    public function testConstruct()
    {
        $command = new TestCommand([
            'string' => 123.456,
            'int' => '123.456',
            'float' => '123.456',
            'bool' => '123.456',
            'array' => '123.456',
            'camel_case' => 'underscore',
        ]);

        $this->assertIsString($command->getString());
        $this->assertIsInt($command->getInt());
        $this->assertIsFloat($command->getFloat());
        $this->assertIsBool($command->getBool());
        $this->assertIsArray($command->getArray());
        $this->assertNotNull($command->getCamelCase());
    }
}
