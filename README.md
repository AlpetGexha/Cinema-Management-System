# Cinema-Management-System

### Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed  
```

User credentials:

```
email: test@example.com
password: password
```

API Endpoints:

- POST /api/login → User authentication
- POST /api/register → New user registration
- GET /api/categories → List categories
- POST /api/categories → Create a category
- PUT /api/categories/{id} → Update a category
- DELETE /api/categories/{id} → Delete a category
- GET /api/movies → List movies
- POST /api/movies → Create a new movie
- PUT /api/movies/{id} → Update movie details
- DELETE /api/movies/{id} → Delete a movie
