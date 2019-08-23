# Laravel Repository Pattern Implementation

A simple Laravel 5 and laravel 6 library that allows you to implement Repository Pattern with a single command

## Installation
```
composer require salmanzafar/laravel-repository-pattern
```

## Features

Will generate all the functionality for Repository pattern implementation

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

That's it, Now you've successfully implemented the repository pattern

## Example

```php
php artisan make:repo Car
```

#### CarRepositoryInterface.php
```php
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
```php
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

##### Now go to 
```Repositories/RepositoryBackendServiceProvider.php```
 and register the interface and class you have'just created

```php
<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoryBackendServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            /*
            * Register your Repository classes and interface here
            **/

            'App\Repositories\CarRepositoryInterface',
            'App\Repositories\CarRepository'
        );
    }
}

```
##### And now in your ```app/Http/Controllers/Carcontroller```

```php
<?php

namespace App\Http\Controllers;

use App\Car;
use App\Repositories\CarRepositoryInterface;

class CarController extends Controller
{
    protected $car;

    public function __construct(CarRepositoryInterface $car)
    {
        $this->$car = $car;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->car->all();

        return $data;
    }
    
}
```



##### That's it you've successfully implemented Repository pattern in your code.
