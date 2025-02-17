# Cinema-Management-System


![image](https://github.com/user-attachments/assets/6721a3cf-1842-41ef-8ac4-91511cfc6ef7)
![image](https://github.com/user-attachments/assets/cd032e06-0a8b-429d-85b6-cc1075f3c146)

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
