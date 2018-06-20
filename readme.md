Laravel Docker:
--------------

#### Requirements:
- [docker](docker.com)

#### Installation:
1. Create a network:
```bash
docker network create laravel
```

2. Make copy of laravel .env.example to .env:
```bash
cp .env.example .env
```

3. Make copy of mysql docker .env.example to .env:
```bash
cp .docker/mysql/.env.example .docker/mysql/.env
```

4. Build docker images
```bash
docker-compose build
```

5. Fill appropriate data into `.docker/mysql/.env` and `.env`
By default it uses `laravel` for user, password and database.

6. Install php dependencies:
```bash
docker-compose exec laravel-php composer install
```

7. Generate application key:
```bash
docker-compose exec laravel-php php artisan key:generate
```

8. Apply migrations:
```bash
docker-compose exec laravel-php artisan migrate
```

9. Run server:
```bash
docker-compose exec laravel-php php artisan serve
```

#### Debugging:
Use the following to enable debugger on mac: [Debug on Mac](./xdebug_on_mac.md)  
For Ubuntu try use this article: [Debug in Docker](https://blog.philipphauer.de/debug-php-docker-container-idea-phpstorm/)
