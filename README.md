Vhinx-ACL
=========

Simple Acl for laravel 4


## Content

1. default log in 
2. (CRUD) maintenance  for users 
    2.1. assign multiple group per user
3. (CRUD) maintenance for groups 
    3.1. assign resources (list of actions) for groups
4. (CRUD) maintenance for resources (list of actions)
5. log out

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





