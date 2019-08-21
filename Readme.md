# Laravel Repository Pattern 

A simple Laravel 5 library that allows you to implement Repository Pattern with a single command

## Installation
```
composer require salmanzafar/laravel-crud-generator
```
## Features

Will generate all the functionality for Repository pattern

* ServiceClass
* Interface
* ServiceProvider

## Enable the package (Optional)
This package implements Laravel auto-discovery feature. After you install it the package provider and facade are added automatically for laravel >= 5.5.

## Configuration
Publish the configuration file

This step is required

```
php artisan vendor:publish --provider="Salman\RepositoryPattern\RepositoryPatterServiceProvider"
```

## Usage

After publishing the configuration file just run the below command

```
php artisan make:repo ModelName
```

Just it, Now you've successfully implemented the repository pattern

## Example

```angular2
php artisan make:repo Car
```

#### CarRepositoryInterface.php
```angular2
<?php

namespace App\Repositories;

interface CarRepositoryInterface
{
    /**
     * Get's a record by it's ID
     *
     * @param int
     */
    public function get($id);

    /**
     * Get's all records.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a record.
     *
     * @param int
     */
    public function delete($id);

    /**
     * Updates a record.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data);
}
```

#### CarRepository.php
```angular2
<?php

namespace App\Repositories;

use App\Car;


class CarRepository implements CarRepositoryInterface
{
    /**
     * Get's a record by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return Car::find($id);
    }

    /**
     * Get's all records.
     *
     * @return mixed
     */
    public function all()
    {
        return Car::all();
    }

    /**
     * Deletes a record.
     *
     * @param int
     */
    public function delete($id)
    {
        Car::destroy($id);
    }

    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data)
    {
        Car::find($id)->update($data);
    }
}
```

##### Now it's done just go to your controller and start using it.
