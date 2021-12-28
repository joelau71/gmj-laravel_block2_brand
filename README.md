# gmj-laravel_block2_brand

Laravel Block for backend and frontend - need tailwindcss support

**composer require gmj/laravel_block2_brand**

in terminal run:<br/>
php artisan vendor:publish --provider="GMJ\LaravelBlock2Brand\LaravelBlock2BrandServiceProvider" --force

php artisan migrate

php artisan db:seed --class=LaravelBlock2BrandSeeder

package for test<br>
composer.json#autoload-dev#psr-4: "GMJ\\LaravelBlock2Brand\\": "package/laravel_block2_brand/src/",<br>
config: GMJ\LaravelBlock2Brand\LaravelBlock2BrandServiceProvider::class,
