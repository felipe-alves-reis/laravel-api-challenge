# Laravel API Challenge

Challenge made for an interview. Api Laravel has courses and categories endpoints + JWT authentication with some unit tests

### Prerequisites

```
* Docker
* Docker-Compose
* Git
* Postman or others
```

## Instructions

```
1 - git clone project

2 - cd project

3 - sudo docker-compose up --build

4 - Composer install

5 - php artisan migrate --seed

6 - php artisan jwt:secret

Enjoy

```

In docker-compose.yml you configure the credentials of the database. (Optional in development).


## Technologies

* Laravel 5.6
* Composer
* MySQL
* PHP 7.1+
* Docker

## Libraries
* barryvdh/laravel-cors
* cviebrock/eloquent-sluggable
* tymon/jwt-auth

## API Docs (Under construction)
* Authentication Endpoints

``
The token has automatic update, each request returns a new automatically generated token, and the old token is disabled.
``

```
Login - Method POST - http://localhost:8000/api/login

Headers {
    "Accept": "application/json",
    "Content-Type": "application/json"
}

Body x-www-form-urlencoded {
    "username": "admin"
    "password": "secret"
}

Response {
    "status code": 200,
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTUzNjE1OTU1MiwiZXhwIjoxNTM2MTYwMTUyLCJuYmYiOjE1MzYxNTk1NTIsImp0aSI6IjY3NUJCanFSVk1aN0RKcXIiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJmdWxsX25hbWUiOiJNaWEgR3JhZHkiLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSIsInVzZXJuYW1lIjoiYWRtaW4ifQ.jX6fPPp4yBZsoOyfSu2jXEfFRPoIDKb5pVCOzMlvmeQ"
}
```

```
Logout - Method POST - http://localhost:8000/api/logout

Headers {
    "Accept": "application/json",
    "Content-Type": "application/json"
    "Authentication": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTUzNjE1OTU1MiwiZXhwIjoxNTM2MTYwMTUyLCJuYmYiOjE1MzYxNTk1NTIsImp0aSI6IjY3NUJCanFSVk1aN0RKcXIiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJmdWxsX25hbWUiOiJNaWEgR3JhZHkiLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSIsInVzZXJuYW1lIjoiYWRtaW4ifQ.jX6fPPp4yBZsoOyfSu2jXEfFRPoIDKb5pVCOzMlvmeQ"
}

return status code 204
```

```
Refresh Token - Method POST - http://localhost:8000/api/refresh_token

Headers {
    "Accept": "application/json",
    "Content-Type": "application/json"
    "Authentication": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTUzNjE1OTU1MiwiZXhwIjoxNTM2MTYwMTUyLCJuYmYiOjE1MzYxNTk1NTIsImp0aSI6IjY3NUJCanFSVk1aN0RKcXIiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJmdWxsX25hbWUiOiJNaWEgR3JhZHkiLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSIsInVzZXJuYW1lIjoiYWRtaW4ifQ.jX6fPPp4yBZsoOyfSu2jXEfFRPoIDKb5pVCOzMlvmeQ"
}

Response {
    "status code": 200,
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTUzNjE1OTU1MiwiZXhwIjoxNTM2MTYwMTUyLCJuYmYiOjE1MzYxNTk1NTIsImp0aSI6IjY3NUJCanFSVk1aN0RKcXIiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJmdWxsX25hbWUiOiJNaWEgR3JhZHkiLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSIsInVzZXJuYW1lIjoiYWRtaW4ifQ.jX6fPPp4yBZsoOyfSu2jXEfFRPoIDKb5pVCOzMlvmeQ"
}
```

```
Get User Logged - Method POST - http://localhost:8000/api/user_logged

Headers {
    "Accept": "application/json",
    "Content-Type": "application/json"
    "Authentication": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTUzNjE1OTU1MiwiZXhwIjoxNTM2MTYwMTUyLCJuYmYiOjE1MzYxNTk1NTIsImp0aSI6IjY3NUJCanFSVk1aN0RKcXIiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJmdWxsX25hbWUiOiJNaWEgR3JhZHkiLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSIsInVzZXJuYW1lIjoiYWRtaW4ifQ.jX6fPPp4yBZsoOyfSu2jXEfFRPoIDKb5pVCOzMlvmeQ"
}

Response {
    "status code": 200,
    "data": User
}
```

* Categories Endpoints (Do the same for users and courses, changing only the respective fields)

```
Get Categories List Paginated - Method GET - http://localhost:8000/api/categories

Headers {
    "Accept": "application/json",
    "Content-Type": "application/json"
    "Authentication": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTUzNjE1OTU1MiwiZXhwIjoxNTM2MTYwMTUyLCJuYmYiOjE1MzYxNTk1NTIsImp0aSI6IjY3NUJCanFSVk1aN0RKcXIiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJmdWxsX25hbWUiOiJNaWEgR3JhZHkiLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSIsInVzZXJuYW1lIjoiYWRtaW4ifQ.jX6fPPp4yBZsoOyfSu2jXEfFRPoIDKb5pVCOzMlvmeQ"
}

Response {
    "status code": 200,
    "data": Paginated Categories
}
```

```
Create Category - Method POST - http://localhost:8000/api/categories

Headers {
    "Accept": "application/json",
    "Content-Type": "application/json"
    "Authentication": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTUzNjE1OTU1MiwiZXhwIjoxNTM2MTYwMTUyLCJuYmYiOjE1MzYxNTk1NTIsImp0aSI6IjY3NUJCanFSVk1aN0RKcXIiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJmdWxsX25hbWUiOiJNaWEgR3JhZHkiLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSIsInVzZXJuYW1lIjoiYWRtaW4ifQ.jX6fPPp4yBZsoOyfSu2jXEfFRPoIDKb5pVCOzMlvmeQ"
}

Body x-www-form-urlencoded {
    "name": "Teste"
}

Response {
    "status code": 201,
    "data": Category
}
```

```
Show Category - Method GET - http://localhost:8000/api/categories/{id}

Headers {
    "Accept": "application/json",
    "Content-Type": "application/json"
    "Authentication": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTUzNjE1OTU1MiwiZXhwIjoxNTM2MTYwMTUyLCJuYmYiOjE1MzYxNTk1NTIsImp0aSI6IjY3NUJCanFSVk1aN0RKcXIiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJmdWxsX25hbWUiOiJNaWEgR3JhZHkiLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSIsInVzZXJuYW1lIjoiYWRtaW4ifQ.jX6fPPp4yBZsoOyfSu2jXEfFRPoIDKb5pVCOzMlvmeQ"
}

Response {
    "status code": 200,
    "data": Category
}
```

```
Update Category - Method PUT - http://localhost:8000/api/categories/{id}

Headers {
    "Accept": "application/json",
    "Content-Type": "application/json"
    "Authentication": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTUzNjE1OTU1MiwiZXhwIjoxNTM2MTYwMTUyLCJuYmYiOjE1MzYxNTk1NTIsImp0aSI6IjY3NUJCanFSVk1aN0RKcXIiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJmdWxsX25hbWUiOiJNaWEgR3JhZHkiLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSIsInVzZXJuYW1lIjoiYWRtaW4ifQ.jX6fPPp4yBZsoOyfSu2jXEfFRPoIDKb5pVCOzMlvmeQ"
}

Body x-www-form-urlencoded {
    "name": "Testes"
}

Response {
    "status code": 200,
    "data": Category
}
```

```
Delete Category - Method DELETE - http://localhost:8000/api/categories/{id}

Headers {
    "Accept": "application/json",
    "Content-Type": "application/json"
    "Authentication": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTUzNjE1OTU1MiwiZXhwIjoxNTM2MTYwMTUyLCJuYmYiOjE1MzYxNTk1NTIsImp0aSI6IjY3NUJCanFSVk1aN0RKcXIiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJmdWxsX25hbWUiOiJNaWEgR3JhZHkiLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSIsInVzZXJuYW1lIjoiYWRtaW4ifQ.jX6fPPp4yBZsoOyfSu2jXEfFRPoIDKb5pVCOzMlvmeQ"
}

return status code 204
```

* Example sync categories in a course

```
Sync Category - Method POST - http://localhost:8000/api/courses/{idCourse}/categories

Headers {
    "Accept": "application/json",
    "Content-Type": "application/json"
    "Authentication": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTUzNjE1OTU1MiwiZXhwIjoxNTM2MTYwMTUyLCJuYmYiOjE1MzYxNTk1NTIsImp0aSI6IjY3NUJCanFSVk1aN0RKcXIiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJmdWxsX25hbWUiOiJNaWEgR3JhZHkiLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSIsInVzZXJuYW1lIjoiYWRtaW4ifQ.jX6fPPp4yBZsoOyfSu2jXEfFRPoIDKb5pVCOzMlvmeQ"
}

Body x-www-form-urlencoded {
    "categories": [1,2,3] (Categories ids)
}

Returns the status code 201, if it has any ids to be synchronized. If it does, it also returns the added categories.
```

## Autor

* **Felipe Alves Reis** - [felipe-alves-reis](http://felipe-alves-reis.github.io)

## Licença

MIT
