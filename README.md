

### COMANDS
    curl -s https://laravel.build/example-app | bash
    ./vendor/bin/sail php artisan make:controller ProviderInvoicesController --api
    ./vendor/bin/sail php artisan make:controller GuidesController --model=GuidesModel

    ./vendor/bin/sail composer dump-autoload
    ./vendor/bin/sail php artisan optimize
    ./vendor/bin/sail php artisan clear-compiled

### PERMISIONS
    chown -R drakoxw: composer.json
### DOCKER COMANDS
    docker build -t api-data /home/drakoxw/api-data-docker/vendor/laravel/sail/runtimes/8.1/
