<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

### Step by step
Clone this Repository
```sh
git clone https://github.com/0xSifu/crud.git my-project
```

Open my-project Directory
```sh
cd my-project/
```

Run Laravel Server
```sh
php artisan serve
```

## About the Repository

This repository contains REST API, which means that the front end is not available yet (back-end purpose only). 

So, it needs Postman to do a trial with the given API or depends on the API tester application that you usually use.


## API

```sh
http://127.0.0.1:8080/api/products
http://127.0.0.1:8080/api/categories
http://127.0.0.1:8080/api/images
http://127.0.0.1:8080/api/product_category
http://127.0.0.1:8080/api/product_image

//Product

Route::get('products', [productController::class, 'index']);
Route::get('product/{id}', [productController::class, 'show']);
Route::post('product', [productController::class, 'store']);
Route::put('product/{id}', [productController::class, 'update']);
Route::delete('product/{id}', [productController::class, 'destroy']);

//Category
Route::get('categories', [categoryController::class, 'index']);
Route::get('category/{id}', [categoryController::class, 'show']);
Route::post('category', [categoryController::class, 'store']);
Route::put('category/{id}', [categoryController::class, 'update']);
Route::delete('category/{id}', [categoryController::class, 'destroy']);

//Image
Route::get('images', [imageController::class, 'index']);
Route::get('image/{id}', [imageController::class, 'show']);
Route::post('image', [imageController::class, 'store']);
Route::post('image/{id}', [imageController::class, 'update']);
Route::delete('image/{id}', [imageController::class, 'destroy']);

//Pivot Product Category
Route::get('product_category', [productController::class, 'product_category']);

//Pivot Product Image
Route::get('product_image', [productController::class, 'product_image']);

```

Just ignore it if you see some port like 8080, for aditional port in my personal laptop was changed due to conflict with any other interface.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
