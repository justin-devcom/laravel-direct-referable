# Instructions for newly installed app

## Install application vendor

```
cd app/path/  && composer install
```

## Add environment file (.env)

```
cp .env.example .env
```

## Set environment variables

## Generate App Key

```
php artisan key:gen
```

## Migrate Database Tables

```
php artisan migrate (optional seed database *php artisan db:seed*)
```
