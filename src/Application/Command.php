<?php

declare(strict_types=1);

namespace ZenBox\Ddd\Application;

use InvalidArgumentException;
use Laminas\Code\Reflection\DocBlockReflection;
use ReflectionClass;
use ReflectionException;

abstract class Command
{
    public function __construct(array $data = [])
    {
        $this->load($data);
    }

    private function load(array $data)
    {
        try {
            $reflection = new ReflectionClass($this);
            foreach ($reflection->getProperties() as $property) {
                if (!$property->getDocComment()) continue;
                $docComment = new DocBlockReflection($property->getDocComment());

                $propertyName = $property->getName();
                $key = $this->fromCamelCase($propertyName);
                $type = $docComment->getTag('var')->getTypes()[0] ?? null;

                if ($type && isset($data[$key])) {
                    $value = $data[$key];
                    settype($value, $type);
                    $this->{$propertyName} = $value;
                }
            }
        } catch (ReflectionException $e) {
            throw new InvalidArgumentException($e->getMessage(), $e->getCode(), $e);
        }
    }

    private function fromCamelCase($input)
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }
}