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

4. Fill appropriate data into `.docker/mysql/.env` and `.env`
By default it uses `laravel` for user, password and database.

5. Build docker images
```bash
docker-compose build
```

6. Run services:
```bash
docker-compose up
```

7. Install php dependencies:
```bash
docker-compose exec laravel-php composer install
```

8. Generate application key:
```bash
docker-compose exec laravel-php php artisan key:generate
```

9. Apply migrations:
```bash
docker-compose exec laravel-php php artisan migrate
```

10. Check whether it works, open browser on [localhost:8000/healthcheck](http://localhost:8000/healthcheck).  

To get phpinfo, use the following endpoint: [localhost:8000/phpinfo](http://localhost:8000/phpinfo)

#### Debugging:
Use the following to enable debugger on mac: [Debug on Mac](./xdebug_on_mac.md)  
For Ubuntu try use this article: [Debug in Docker](https://blog.philipphauer.de/debug-php-docker-container-idea-phpstorm/)

#### Connect to docker instances:
Connect to redis instance:
```bash
docker-compose exec laravel-redis redis-cli
```
