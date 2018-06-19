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

4. Make copy of php docker .env.example to .env:
```bash
cp .docker/php/.env.example .docker/php/.env
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

8. Run server:
```bash
docker-compose exec laravel-php php artisan serve
```
