## Task 2 for Nusantara Infrastructure

### POST Login (/api/login)
body :
```json
{
  "email": "mark@gmail.com",
  "password": "password"
}
```
response 200 :
```json
{
  "message": "User created",
  "token": "3|v3lhx4fM6WVry1PEu13SsAZfawTRIcfc6vUAikVM"
}
```
response 401 :
```json
{
  "message": "Invalid credentials"
}
```


---

### POST Register (/api/register)
body :
```json
{
  "name": "Mark",
  "email": "mark@gmail.com",
  "password": "password",
  "password_confirmation": "password"
}
```
response 200 :
```json
{
  "message": "User created",
  "user": {
    "name": "Mark",
    "email": "mark@gmail.com",
    "updated_at": "2023-02-04T01:59:29.000000Z",
    "created_at": "2023-02-04T01:59:29.000000Z",
    "id": 3
  }
}
```
response 422 :
```json
{
  "message": "Register failed",
  "errors": {
    "name": [
      "The name field is required."
    ],
    "email": [
      "The email has already been taken."
    ],
    "password": [
      "The password confirmation does not match."
    ]
  }
}
```
response 500 :
```json
{
  "message": "Register Failed"
}
```
---
### GET Profile User (/api/user)
header :
```
Authorization: Bearer 4|JoIjHAlG4lm6dYZBnku7oGm3R7CYQ66PWw1RKw10
```
response 200 :
```json
{
  "id": 3,
  "name": "Mark",
  "email": "mark@gmail.com",
  "email_verified_at": null,
  "created_at": "2023-02-04T01:59:29.000000Z",
  "updated_at": "2023-02-04T01:59:29.000000Z"
}
```
---
### POST Logout (/api/logout)
header :
```
Authorization: Bearer 4|JoIjHAlG4lm6dYZBnku7oGm3R7CYQ66PWw1RKw10
```
response 200 :
```json
{
  "message": "Logged out"
}
```
---
### GET Retrieve All Books (/api/books)
response 200 :
```json
{
  "current_page": 1,
  "data": [],
  "first_page_url": "http://localhost:8000/api/books?page=1",
  "from": null,
  "last_page": 1,
  "last_page_url": "http://localhost:8000/api/books?page=1",
  "links": [
    {
      "url": null,
      "label": "&laquo; Previous",
      "active": false
    },
    {
      "url": "http://localhost:8000/api/books?page=1",
      "label": "1",
      "active": true
    },
    {
      "url": null,
      "label": "Next &raquo;",
      "active": false
    }
  ],
  "next_page_url": null,
  "path": "http://localhost:8000/api/books",
  "per_page": 15,
  "prev_page_url": null,
  "to": null,
  "total": 0
}
```
---
### GET Retrieve Book Item (/api/books/(:id))
response 200 :
```json
{
  "id": 2,
  "user_id": 1,
  "isbn": "666",
  "title": "sdjfaskjdfskjh",
  "subtitle": "sfasfaskjnfd",
  "author": "sdjkafhkashf",
  "published": "sjfdasjkdfhaksjhdfkjh",
  "publisher": "sdfjsjkdfaksdfk",
  "pages": 555,
  "description": "jjaksfjkashfsjkhkhfd",
  "website": "djfgsdgkdfhkg",
  "created_at": "2023-02-04T01:35:24.000000Z",
  "updated_at": "2023-02-04T01:35:24.000000Z"
}
```
response 404 :
```json
{
  "message": "Book Not Found"
}
```
---
### POST Insert Book (/api/books/add)
body :
```json
{
  "isbn": "9781491943533",
  "title": "Practical Modern JavaScript",
  "subtitle": "Dive into ES6 and the Future of JavaScript",
  "author": "Nicolás Bevacqua",
  "published": "2017-07-16 00:00:00",
  "publisher": "O'Reilly Media",
  "pages": 334,
  "description": "To get the most out of modern JavaScript, you need learn the latest features of its parent specification, ECMAScript 6 (ES6). This book provides a highly practical look at ES6, without getting lost in the specification or its implementation details.",
  "website": "https://github.com/mjavascript/practical-modern-javascript"
}
```
response 200 :
```json
{
  "message": "Book created",
  "book": {
    "user_id": 3,
    "isbn": "9781491943533",
    "title": "Practical Modern JavaScript",
    "subtitle": "Dive into ES6 and the Future of JavaScript",
    "author": "Nicolás Bevacqua",
    "published": "2017-07-16 00:00:00",
    "publisher": "O'Reilly Media",
    "pages": 334,
    "description": "To get the most out of modern JavaScript, you need learn the latest features of its parent specification, ECMAScript 6 (ES6). This book provides a highly practical look at ES6, without getting lost in the specification or its implementation details.",
    "website": "https://github.com/mjavascript/practical-modern-javascript",
    "updated_at": "2023-02-04T02:14:26.000000Z",
    "created_at": "2023-02-04T02:14:26.000000Z",
    "id": 3
  }
}
```
response 404 :
```json
{
  "message": "Book Not Found"
}
```
---
### PUT Update Book (/api/books/(:id)/edit)
body :
```json
{
  "user_id": 3,
  "isbn": "9781491943533",
  "title": "Practical Modern JavaScript",
  "subtitle": "Dive into ES6 and the Future of JavaScript",
  "author": "Nicolás Bevacqua",
  "published": "2017-07-16 00:00:00",
  "publisher": "O'Reilly Media",
  "pages": 334,
  "description": "To get the most out of modern JavaScript, you need learn the latest features of its parent specification, ECMAScript 6 (ES6). This book provides a highly practical look at ES6, without getting lost in the specification or its implementation details.",
  "website": "https://github.com/mjavascript/practical-modern-javascript",
  "updated_at": "2023-02-04T02:14:26.000000Z",
  "created_at": "2023-02-04T02:14:26.000000Z",
}
```
response 200 :
```json
{
  "message": "Book updated",
  "book": {
    "id": 3,
    "user_id": 3,
    "isbn": "9781491943533",
    "title": "Practical Modern JavaScript",
    "subtitle": "Dive into ES6 and the Future of JavaScript",
    "author": "Nicolás Bevacqua",
    "published": "2017-07-16 00:00:00",
    "publisher": "O'Reilly Media",
    "pages": 334,
    "description": "To get the most out of modern JavaScript, you need learn the latest features of its parent specification, ECMAScript 6 (ES6). This book provides a highly practical look at ES6, without getting lost in the specification or its implementation details.",
    "website": "https://github.com/mjavascript/practical-modern-javascript",
    "created_at": "2023-02-04T02:14:26.000000Z",
    "updated_at": "2023-02-04T02:19:17.000000Z"
  }
}
```
response 404 :
```json
{
  "message": "Book Not Found"
}
```
---
### DELETE Delete Book (/api/books/(:id)/delete)
response 200 :
```json
{
  "message": "Book Deleted",
  "book": {
    "id": 4,
    "user_id": 3,
    "isbn": "9781491943533",
    "title": "Practical Modern JavaScript",
    "subtitle": "Dive into ES6 and the Future of JavaScript",
    "author": "Nicolás Bevacqua",
    "published": "2017-07-16 00:00:00",
    "publisher": "O'Reilly Media",
    "pages": 334,
    "description": "To get the most out of modern JavaScript, you need learn the latest features of its parent specification, ECMAScript 6 (ES6). This book provides a highly practical look at ES6, without getting lost in the specification or its implementation details.",
    "website": "https://github.com/mjavascript/practical-modern-javascript",
    "created_at": "2023-02-04T02:40:09.000000Z",
    "updated_at": "2023-02-04T02:40:09.000000Z"
  }
}
```
response 404 :
```json
{
  "message": "Book Not Found"
}
```
---
### POST Search Books (/api/books/search)
body :
```json
{
  "search": "Prac"
}
```
response 200 :
```json
{
  "current_page": 1,
  "data": [
    {
      "id": 5,
      "user_id": 3,
      "isbn": "9781491943533",
      "title": "Practical Modern JavaScript",
      "subtitle": "Dive into ES6 and the Future of JavaScript",
      "author": "Nicolás Bevacqua",
      "published": "2017-07-16 00:00:00",
      "publisher": "O'Reilly Media",
      "pages": 334,
      "description": "To get the most out of modern JavaScript, you need learn the latest features of its parent specification, ECMAScript 6 (ES6). This book provides a highly practical look at ES6, without getting lost in the specification or its implementation details.",
      "website": "https://github.com/mjavascript/practical-modern-javascript",
      "created_at": "2023-02-04T02:41:27.000000Z",
      "updated_at": "2023-02-04T02:41:27.000000Z"
    }
  ],
  "first_page_url": "http://localhost:8000/api/books/search?page=1",
  "from": 1,
  "last_page": 1,
  "last_page_url": "http://localhost:8000/api/books/search?page=1",
  "links": [
    {
      "url": null,
      "label": "&laquo; Previous",
      "active": false
    },
    {
      "url": "http://localhost:8000/api/books/search?page=1",
      "label": "1",
      "active": true
    },
    {
      "url": null,
      "label": "Next &raquo;",
      "active": false
    }
  ],
  "next_page_url": null,
  "path": "http://localhost:8000/api/books/search",
  "per_page": 15,
  "prev_page_url": null,
  "to": 1,
  "total": 1
}
```

