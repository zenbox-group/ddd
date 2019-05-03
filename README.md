# ZenBox DDD

[![PHP Version](https://img.shields.io/packagist/php-v/zenbox/ddd.svg?style=for-the-badge)](https://packagist.org/packages/zenbox/ddd)
[![Stable Version](https://img.shields.io/packagist/v/zenbox/ddd.svg?style=for-the-badge&label=Latest)](https://packagist.org/packages/zenbox/ddd)
[![Total Downloads](https://img.shields.io/packagist/dt/zenbox/ddd.svg?style=for-the-badge&label=Total+downloads)](https://packagist.org/packages/zenbox/ddd)

Domain Driven Design in PHP

* Assert [beberlei/assert](https://github.com/beberlei/assert)
* UuidIdentifier [ramsey/uuid](https://github.com/ramsey/uuid)
* Command
* Query
* Specification

## Installation

Using Composer:

```sh
composer require zenbox/ddd
```

## Examples

See [example/](https://github.com/zenbox-group/ddd/tree/master/example) for some examples.

## Doctrine UUID type

Add Doctrine custom type `uuid`

```php
<?php

use ZenBox\Ddd\Infrastructure\Persistence\Doctrine\UuidType;

Type::addType(UuidType::NAME, UuidType::class);

```
