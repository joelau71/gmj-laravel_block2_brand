# gmj-laravelblock2brandcontent

Laravel Block for backend and frontend - need tailwindcss support

composer require gmj/laravel_block2_brand

in terminal run: php artisan vendor:publish --provider="GMJ\LaravelBlock2Brand\LaravelBlock2BrandServiceProvider" --force

php artisan migrate

php artisan db:seed --class=LaravelBlock2BrandSeeder
