Vhinx-ACL
=========

Simple Acl for laravel 4



## Installation

Add the following line to the `require` section of `composer.json`:

```json
{
    "require": {
        "vhinx/acl": "dev-master"
    }
}
```

## Setup

1. Add `Vhinx\Acl\VhinxServiceProvider` to the service provider list in `app/config/app.php`.
2. change the value of model in `app/config/auth.php` to `Vhinx\\Acl\\Models\\User`
3. run `php artisan migrate --package=Vhinx/Acl`
4. run `php artisan db:seed --classname=DataSeeder`



