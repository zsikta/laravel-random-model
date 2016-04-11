# Laravel random model

Laravel package for get a random model from database.

## Installation

Require this package with composer:

```
composer require zsikta/laravel-random-model
```

## Usage

Use *RandomQueryable* trait in your model:

```php
<?php

use ZsikTa\LaravelRandomModel\RandomQueryable;

class YourModel extends Model
{
    use RandomQueryable;
}
```

You can now use as scope:

```php
$singleModel = YourModel::random()->first();

$modelWithRelation = YourModel::random()->with('relation_name')->first();
```

Or static getter methods which return an instance:

```php
$model = YourModel::getRandom(); // returns an instance or null

$otherModel = YourModel::getRandomOrFail(); // returns an instance or throws exception
```
