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
