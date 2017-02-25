---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_da5727be600e4865c1b632f7745c8e91 -->
## api/users

> Example request:

```bash
curl "http://localhost/api/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "users": [
        {
            "id": 1,
            "unique_id": "yMWXD0lNZlWG",
            "name": "nilsenj",
            "email": "nilsenj@yandex.ua",
            "telephone": null,
            "ip": null,
            "slug": "nilsenj",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:09",
            "updated_at": "2017-02-11 15:50:47",
            "notify": "y"
        },
        {
            "id": 2,
            "unique_id": "4PbaG9B2Gjr6",
            "name": "nilsenj",
            "email": "nikoleivan@gmail.com",
            "telephone": null,
            "ip": null,
            "slug": "nilsenj-1",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:09",
            "updated_at": "2017-02-11 14:28:09",
            "notify": "y"
        },
        {
            "id": 3,
            "unique_id": "2abBwxnnQxWw",
            "name": "Mr. Patrick Beatty DDS",
            "email": "zemard@example.org",
            "telephone": null,
            "ip": null,
            "slug": "mr-patrick-beatty-dds",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 4,
            "unique_id": "LjrYj1RvPMq5",
            "name": "Wendy Oberbrunner",
            "email": "cvolkman@example.com",
            "telephone": null,
            "ip": null,
            "slug": "wendy-oberbrunner",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 5,
            "unique_id": "aeqVJnGmVqGR",
            "name": "Mafalda Hauck",
            "email": "xboyle@example.com",
            "telephone": null,
            "ip": null,
            "slug": "mafalda-hauck",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 6,
            "unique_id": "xJWzzlGJwWNn",
            "name": "Mariam Rempel",
            "email": "wolf.paolo@example.net",
            "telephone": null,
            "ip": null,
            "slug": "mariam-rempel",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 7,
            "unique_id": "xVbpPEJBlAb1",
            "name": "Tristin Schmidt",
            "email": "shaina.pollich@example.net",
            "telephone": null,
            "ip": null,
            "slug": "tristin-schmidt",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 8,
            "unique_id": "Jlq1523Jj9qR",
            "name": "Raoul Erdman",
            "email": "jhaag@example.org",
            "telephone": null,
            "ip": null,
            "slug": "raoul-erdman",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 9,
            "unique_id": "AdWN971O1Rbg",
            "name": "Alexandrea Jast",
            "email": "alysa.murphy@example.com",
            "telephone": null,
            "ip": null,
            "slug": "alexandrea-jast",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 10,
            "unique_id": "LjrYjGQxOaq5",
            "name": "Kira Rau",
            "email": "stanley50@example.net",
            "telephone": null,
            "ip": null,
            "slug": "kira-rau",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 11,
            "unique_id": "59bxnpYVLarO",
            "name": "Moshe Padberg",
            "email": "joel.heaney@example.net",
            "telephone": null,
            "ip": null,
            "slug": "moshe-padberg",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 12,
            "unique_id": "aeqVx4G8j6WG",
            "name": "Blake Williamson",
            "email": "weldon83@example.com",
            "telephone": null,
            "ip": null,
            "slug": "blake-williamson",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 13,
            "unique_id": "LjrY15wvxXr5",
            "name": "Jalen Mills V",
            "email": "lenny.pfannerstill@example.com",
            "telephone": null,
            "ip": null,
            "slug": "jalen-mills-v",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 14,
            "unique_id": "LjrYdXgQA7W5",
            "name": "Verner Torphy",
            "email": "stoltenberg.henri@example.org",
            "telephone": null,
            "ip": null,
            "slug": "verner-torphy",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 15,
            "unique_id": "yMWXm3yDmMrG",
            "name": "Norberto Cole",
            "email": "nebert@example.org",
            "telephone": null,
            "ip": null,
            "slug": "norberto-cole",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 16,
            "unique_id": "g0W4D2eG70WJ",
            "name": "Johnny Larson",
            "email": "cameron45@example.net",
            "telephone": null,
            "ip": null,
            "slug": "johnny-larson",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 17,
            "unique_id": "3nqdgN7AkKr2",
            "name": "Lazaro Blanda",
            "email": "labadie.richard@example.net",
            "telephone": null,
            "ip": null,
            "slug": "lazaro-blanda",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 18,
            "unique_id": "g0W4yd1k1jrJ",
            "name": "Johathan Batz",
            "email": "hintz.gideon@example.com",
            "telephone": null,
            "ip": null,
            "slug": "johathan-batz",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 19,
            "unique_id": "g0W433XNpbJz",
            "name": "Deonte Schamberger",
            "email": "rritchie@example.org",
            "telephone": null,
            "ip": null,
            "slug": "deonte-schamberger",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 20,
            "unique_id": "ZLr93Aj6kbeE",
            "name": "Mrs. Pearlie Johnston",
            "email": "myrna.hoppe@example.net",
            "telephone": null,
            "ip": null,
            "slug": "mrs-pearlie-johnston",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 21,
            "unique_id": "eJWG34xYv4Wo",
            "name": "Aracely Jenkins",
            "email": "meaghan.labadie@example.com",
            "telephone": null,
            "ip": null,
            "slug": "aracely-jenkins",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        },
        {
            "id": 22,
            "unique_id": "6ybklwYyLoW3",
            "name": "Ms. Patricia Grimes PhD",
            "email": "ofisher@example.com",
            "telephone": null,
            "ip": null,
            "slug": "ms-patricia-grimes-phd",
            "logo_path": null,
            "created_at": "2017-02-11 14:28:11",
            "updated_at": "2017-02-11 14:28:11",
            "notify": "y"
        }
    ]
}
```

### HTTP Request
`GET api/users`

`HEAD api/users`


<!-- END_da5727be600e4865c1b632f7745c8e91 -->
<!-- START_4a6a89e9e0eaea9c72ceea57315f2c42 -->
## api/authenticate

> Example request:

```bash
curl "http://localhost/api/authenticate" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/authenticate",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/authenticate`


<!-- END_4a6a89e9e0eaea9c72ceea57315f2c42 -->
<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## api/register

> Example request:

```bash
curl "http://localhost/api/register" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/register",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/register`


<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->
<!-- START_6d6bbcff6a499e3befdf210987ddb65a -->
## api/getUser

> Example request:

```bash
curl "http://localhost/api/getUser" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/getUser",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/getUser`


<!-- END_6d6bbcff6a499e3befdf210987ddb65a -->
<!-- START_f9bb43b2d406a133a7646f806a34310b -->
## Display the form to request a password reset link.

> Example request:

```bash
curl "http://localhost/password/reset" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/password/reset",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET password/reset`

`HEAD password/reset`


<!-- END_f9bb43b2d406a133a7646f806a34310b -->
<!-- START_5a0014b83f352dff4e16558b63bfd23e -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl "http://localhost/password/reset/{token}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/password/reset/{token}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET password/reset/{token}`

`HEAD password/reset/{token}`


<!-- END_5a0014b83f352dff4e16558b63bfd23e -->
<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl "http://localhost/password/reset" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/password/reset",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->
<!-- START_0f15af4a72ec033d66ef9a320727b267 -->
## Show the application dashboard.

> Example request:

```bash
curl "http://localhost//" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /`

`HEAD /`


<!-- END_0f15af4a72ec033d66ef9a320727b267 -->
<!-- START_45def4da6d09e649f3b2c95189bbb020 -->
## Show the application&#039;s login form.

> Example request:

```bash
curl "http://localhost/login" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/login",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET login`

`HEAD login`


<!-- END_45def4da6d09e649f3b2c95189bbb020 -->
<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl "http://localhost/login" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/login",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->
<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl "http://localhost/logout" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/logout",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->
<!-- START_d7e8ee2d51ff436e319caca5ab309cd9 -->
## Show the application registration form.

> Example request:

```bash
curl "http://localhost/register" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/register",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET register`

`HEAD register`


<!-- END_d7e8ee2d51ff436e319caca5ab309cd9 -->
<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl "http://localhost/register" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/register",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->
<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl "http://localhost/password/email" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/password/email",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->
<!-- START_78c84aedea5cf9f44215a083c149daee -->
## Log the user out of the application.

> Example request:

```bash
curl "http://localhost/logout" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/logout",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET logout`

`HEAD logout`


<!-- END_78c84aedea5cf9f44215a083c149daee -->
<!-- START_4d12119dce26b7df4c0c737c5de8f208 -->
## home

> Example request:

```bash
curl "http://localhost/home" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/home",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET home`

`HEAD home`


<!-- END_4d12119dce26b7df4c0c737c5de8f208 -->
<!-- START_9566a8caf83dacf40a3ebd7e35855d2d -->
## admin/dashboard

> Example request:

```bash
curl "http://localhost/admin/dashboard" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/dashboard",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/dashboard`

`HEAD admin/dashboard`


<!-- END_9566a8caf83dacf40a3ebd7e35855d2d -->
<!-- START_7423f04c3e3eab0779fda86600776e5e -->
## admin

> Example request:

```bash
curl "http://localhost/admin" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin`

`HEAD admin`


<!-- END_7423f04c3e3eab0779fda86600776e5e -->
<!-- START_ff11ccfb114261ba8ecbefc739976651 -->
## admin/users

> Example request:

```bash
curl "http://localhost/admin/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/users",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/users`

`HEAD admin/users`


<!-- END_ff11ccfb114261ba8ecbefc739976651 -->
<!-- START_237b928edd0f78964aac912baadf5419 -->
## admin/users/{id}

> Example request:

```bash
curl "http://localhost/admin/users/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/users/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/users/{id}`

`HEAD admin/users/{id}`


<!-- END_237b928edd0f78964aac912baadf5419 -->
<!-- START_48136b06fd1792f3bd56918869dd7804 -->
## admin/users/create

> Example request:

```bash
curl "http://localhost/admin/users/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/users/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/users/create`

`HEAD admin/users/create`


<!-- END_48136b06fd1792f3bd56918869dd7804 -->
<!-- START_5102d2997698b00de90aed329b162d11 -->
## admin/users/edit/{id}

> Example request:

```bash
curl "http://localhost/admin/users/edit/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/users/edit/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/users/edit/{id}`

`HEAD admin/users/edit/{id}`


<!-- END_5102d2997698b00de90aed329b162d11 -->
<!-- START_4b2cd33547cef7b58d5f3861480542dc -->
## admin/users/update/{id}

> Example request:

```bash
curl "http://localhost/admin/users/update/{id}" \
-H "Accept: application/json" \
    -d "name"="accusantium" \
    -d "email"="accusantium" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/users/update/{id}",
    "method": "PUT",
    "data": {
        "name": "accusantium",
        "email": "accusantium"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT admin/users/update/{id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    email | string |  required  | 

<!-- END_4b2cd33547cef7b58d5f3861480542dc -->
<!-- START_ff0c8890a029256daf70dac0fed732ec -->
## admin/users/{id}

> Example request:

```bash
curl "http://localhost/admin/users/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/users/{id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE admin/users/{id}`


<!-- END_ff0c8890a029256daf70dac0fed732ec -->
<!-- START_d8624d392c180319cfbf48d1d1a01b82 -->
## admin/users/store

> Example request:

```bash
curl "http://localhost/admin/users/store" \
-H "Accept: application/json" \
    -d "name"="explicabo" \
    -d "email"="gsmitham@example.org" \
    -d "password"="explicabo" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/users/store",
    "method": "POST",
    "data": {
        "name": "explicabo",
        "email": "gsmitham@example.org",
        "password": "explicabo"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST admin/users/store`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    email | email |  required  | 
    password | string |  required  | Minimum: `6` Maximum: `20`

<!-- END_d8624d392c180319cfbf48d1d1a01b82 -->
<!-- START_2628526963c7e5d4dea9a773fd4e05ef -->
## admin/users/delete/{id}

> Example request:

```bash
curl "http://localhost/admin/users/delete/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/users/delete/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/users/delete/{id}`

`HEAD admin/users/delete/{id}`


<!-- END_2628526963c7e5d4dea9a773fd4e05ef -->
<!-- START_61e4172a1d6579d185ae5a65c8be800e -->
## admin/media/index

> Example request:

```bash
curl "http://localhost/admin/media/index" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/media/index",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/media/index`

`HEAD admin/media/index`


<!-- END_61e4172a1d6579d185ae5a65c8be800e -->
<!-- START_6b5f19c05772390c2aaf06d0231bc431 -->
## admin/media/index/{disk}/{path?}

> Example request:

```bash
curl "http://localhost/admin/media/index/{disk}/{path?}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/media/index/{disk}/{path?}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/media/index/{disk}/{path?}`

`HEAD admin/media/index/{disk}/{path?}`


<!-- END_6b5f19c05772390c2aaf06d0231bc431 -->
<!-- START_5feb11cfedd337187fc152feddb2c99a -->
## get folder structure and response for json requests

> Example request:

```bash
curl "http://localhost/admin/media/getIndex/{disk}/{path?}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/media/getIndex/{disk}/{path?}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/media/getIndex/{disk}/{path?}`

`HEAD admin/media/getIndex/{disk}/{path?}`


<!-- END_5feb11cfedd337187fc152feddb2c99a -->
<!-- START_6795542bfd3eb837c9e3d410e3e24be3 -->
## get folders and files in html format and
response for json requests for
file linker functionality

> Example request:

```bash
curl "http://localhost/admin/media/file_linker/{disk}/{folder?}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/media/file_linker/{disk}/{folder?}",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST admin/media/file_linker/{disk}/{folder?}`


<!-- END_6795542bfd3eb837c9e3d410e3e24be3 -->
<!-- START_dd47e7c2b05eb2da198143af157eddc5 -->
## get folders and response
for json requests
to reload

> Example request:

```bash
curl "http://localhost/admin/media/getIndexFolders/{disk}/{folder?}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/media/getIndexFolders/{disk}/{folder?}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/media/getIndexFolders/{disk}/{folder?}`

`HEAD admin/media/getIndexFolders/{disk}/{folder?}`


<!-- END_dd47e7c2b05eb2da198143af157eddc5 -->
<!-- START_6337dcff68b14f4e63e29b91b20e3c7b -->
## download file link

> Example request:

```bash
curl "http://localhost/admin/media/download/{disk}/{id}/{folder}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/media/download/{disk}/{id}/{folder}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET admin/media/download/{disk}/{id}/{folder}`

`HEAD admin/media/download/{disk}/{id}/{folder}`


<!-- END_6337dcff68b14f4e63e29b91b20e3c7b -->
<!-- START_86f604cc675c0276440b8fe957998abf -->
## make folder &amp;&amp; store the
folder in table

> Example request:

```bash
curl "http://localhost/admin/media/makeDirectory/{disk}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/media/makeDirectory/{disk}",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST admin/media/makeDirectory/{disk}`


<!-- END_86f604cc675c0276440b8fe957998abf -->
<!-- START_cf9f7babefe014b96743f3150fb98887 -->
## admin/media/renameDirectory/{disk}

> Example request:

```bash
curl "http://localhost/admin/media/renameDirectory/{disk}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/media/renameDirectory/{disk}",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST admin/media/renameDirectory/{disk}`


<!-- END_cf9f7babefe014b96743f3150fb98887 -->
<!-- START_d249da83de07833a8fa7b8e1f9f5e200 -->
## admin/media/renameFile/{disk}

> Example request:

```bash
curl "http://localhost/admin/media/renameFile/{disk}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/media/renameFile/{disk}",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST admin/media/renameFile/{disk}`


<!-- END_d249da83de07833a8fa7b8e1f9f5e200 -->
<!-- START_32b0d09d25f09468696fd5c30e34e5af -->
## Remove the specified media
from storage.

> Example request:

```bash
curl "http://localhost/admin/media/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/media/{id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE admin/media/{id}`


<!-- END_32b0d09d25f09468696fd5c30e34e5af -->
<!-- START_902bf5d0f730198b271c2103df5be1da -->
## upload files

> Example request:

```bash
curl "http://localhost/admin/media/upload/{disk}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/media/upload/{disk}",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST admin/media/upload/{disk}`


<!-- END_902bf5d0f730198b271c2103df5be1da -->
<!-- START_dc0a057308f28d11c36723746ca1cf90 -->
## Remove the specified media
from storage.

> Example request:

```bash
curl "http://localhost/admin/media/delete/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/media/delete/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/media/delete/{id}`

`HEAD admin/media/delete/{id}`


<!-- END_dc0a057308f28d11c36723746ca1cf90 -->
<!-- START_7e4cfab6014fcca36048abab82c9cf15 -->
## remove folder and the files
attached

> Example request:

```bash
curl "http://localhost/admin/media/delete/folder/{disk}/{folder}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/media/delete/folder/{disk}/{folder}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET admin/media/delete/folder/{disk}/{folder}`

`HEAD admin/media/delete/folder/{disk}/{folder}`


<!-- END_7e4cfab6014fcca36048abab82c9cf15 -->
<!-- START_e3bf14a6b5157f1622ee28c7e02eceed -->
## admin/roles

> Example request:

```bash
curl "http://localhost/admin/roles" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/roles",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/roles`

`HEAD admin/roles`


<!-- END_e3bf14a6b5157f1622ee28c7e02eceed -->
<!-- START_aa8b27d565aa6b532ef8c15c616e264e -->
## admin/roles/create

> Example request:

```bash
curl "http://localhost/admin/roles/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/roles/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/roles/create`

`HEAD admin/roles/create`


<!-- END_aa8b27d565aa6b532ef8c15c616e264e -->
<!-- START_243bd68f296e17978e8ac44b2c1bafdc -->
## admin/roles/edit/{id}

> Example request:

```bash
curl "http://localhost/admin/roles/edit/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/roles/edit/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/roles/edit/{id}`

`HEAD admin/roles/edit/{id}`


<!-- END_243bd68f296e17978e8ac44b2c1bafdc -->
<!-- START_611aae48581a258cb0fa82d693f9735c -->
## admin/roles/update/{id}

> Example request:

```bash
curl "http://localhost/admin/roles/update/{id}" \
-H "Accept: application/json" \
    -d "name"="velit" \
    -d "display_name"="velit" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/roles/update/{id}",
    "method": "PUT",
    "data": {
        "name": "velit",
        "display_name": "velit"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT admin/roles/update/{id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    display_name | string |  required  | 

<!-- END_611aae48581a258cb0fa82d693f9735c -->
<!-- START_fe440d0352457bb6a8a128df35351378 -->
## admin/roles/{id}

> Example request:

```bash
curl "http://localhost/admin/roles/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/roles/{id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE admin/roles/{id}`


<!-- END_fe440d0352457bb6a8a128df35351378 -->
<!-- START_5006ab02caf795291dc01dfd98a1e4d1 -->
## admin/roles/store

> Example request:

```bash
curl "http://localhost/admin/roles/store" \
-H "Accept: application/json" \
    -d "name"="incidunt" \
    -d "display_name"="incidunt" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/roles/store",
    "method": "POST",
    "data": {
        "name": "incidunt",
        "display_name": "incidunt"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST admin/roles/store`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    display_name | string |  optional  | 

<!-- END_5006ab02caf795291dc01dfd98a1e4d1 -->
<!-- START_3ba14f60cb3fefb8bfd179278cc62202 -->
## get permissions name in json format

> Example request:

```bash
curl "http://localhost/admin/roles/perms/json" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/roles/perms/json",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/roles/perms/json`

`HEAD admin/roles/perms/json`


<!-- END_3ba14f60cb3fefb8bfd179278cc62202 -->
<!-- START_ff50e8faa74047f54c7916ef5c8fb3cb -->
## admin/roles/delete/{id}

> Example request:

```bash
curl "http://localhost/admin/roles/delete/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/roles/delete/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/roles/delete/{id}`

`HEAD admin/roles/delete/{id}`


<!-- END_ff50e8faa74047f54c7916ef5c8fb3cb -->
<!-- START_48ef1d4d6ebe7fce40b41b8ed155234e -->
## admin/products

> Example request:

```bash
curl "http://localhost/admin/products" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/products",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/products`

`HEAD admin/products`


<!-- END_48ef1d4d6ebe7fce40b41b8ed155234e -->
<!-- START_68148136eed05c3b79287cf1b3b56b3c -->
## admin/products/show/{id}

> Example request:

```bash
curl "http://localhost/admin/products/show/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/products/show/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/products/show/{id}`

`HEAD admin/products/show/{id}`


<!-- END_68148136eed05c3b79287cf1b3b56b3c -->
<!-- START_e0c1b7231758d999761a3775ac26a402 -->
## admin/products/create

> Example request:

```bash
curl "http://localhost/admin/products/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/products/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/products/create`

`HEAD admin/products/create`


<!-- END_e0c1b7231758d999761a3775ac26a402 -->
<!-- START_d723d703d81da03d2ed8c9c0ffed9691 -->
## admin/products/edit/{id}

> Example request:

```bash
curl "http://localhost/admin/products/edit/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/products/edit/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/products/edit/{id}`

`HEAD admin/products/edit/{id}`


<!-- END_d723d703d81da03d2ed8c9c0ffed9691 -->
<!-- START_0959b885b472b166fa1ed97f1882a7a3 -->
## Update the specified article in storage.

> Example request:

```bash
curl "http://localhost/admin/products/update/{id}" \
-H "Accept: application/json" \
    -d "title"="ut" \
    -d "body"="ut" \
    -d "price"="198254657" \
    -d "availability"="198254657" \
    -d "category_id"="198254657" \
    -d "date_available"="2007-10-28" \
    -d "model"="ut" \
    -d "quantity"="198254657" \
    -d "sku"="ut" \
    -d "upc"="ut" \
    -d "ean"="ut" \
    -d "jan"="ut" \
    -d "isbn"="ut" \
    -d "mpn"="ut" \
    -d "length"="ut" \
    -d "width"="ut" \
    -d "height"="ut" \
    -d "meta_tag_title"="ut" \
    -d "meta_tag_description"="ut" \
    -d "meta_tag_keywords"="ut" \
    -d "sort_order"="2" \
    -d "weight"="ut" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/products/update/{id}",
    "method": "PUT",
    "data": {
        "title": "ut",
        "body": "ut",
        "price": 198254657,
        "availability": 198254657,
        "category_id": 198254657,
        "date_available": "2007-10-28",
        "model": "ut",
        "quantity": 198254657,
        "sku": "ut",
        "upc": "ut",
        "ean": "ut",
        "jan": "ut",
        "isbn": "ut",
        "mpn": "ut",
        "length": "ut",
        "width": "ut",
        "height": "ut",
        "meta_tag_title": "ut",
        "meta_tag_description": "ut",
        "meta_tag_keywords": "ut",
        "sort_order": 2,
        "weight": "ut"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT admin/products/update/{id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | Minimum: `2`
    body | string |  required  | Minimum: `20`
    price | numeric |  required  | 
    availability | integer |  required  | 
    category_id | integer |  required  | 
    date_available | date |  optional  | 
    model | string |  optional  | Minimum: `2`
    quantity | numeric |  optional  | 
    sku | string |  optional  | 
    upc | string |  optional  | 
    ean | string |  optional  | 
    jan | string |  optional  | 
    isbn | string |  optional  | 
    mpn | string |  optional  | 
    length | string |  optional  | Minimum: `1`
    width | string |  optional  | Minimum: `1`
    height | string |  optional  | Minimum: `1`
    meta_tag_title | string |  optional  | Minimum: `2`
    meta_tag_description | string |  optional  | Minimum: `5`
    meta_tag_keywords | string |  optional  | Minimum: `2`
    sort_order | numeric |  optional  | Maximum: `10`
    weight | string |  optional  | Minimum: `1`

<!-- END_0959b885b472b166fa1ed97f1882a7a3 -->
<!-- START_a0145d8943adeca65a5b5035d6be1190 -->
## Remove the specified article from storage.

> Example request:

```bash
curl "http://localhost/admin/products/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/products/{id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE admin/products/{id}`


<!-- END_a0145d8943adeca65a5b5035d6be1190 -->
<!-- START_b687d664dee76f87ffcc0eef82feade6 -->
## admin/products/store

> Example request:

```bash
curl "http://localhost/admin/products/store" \
-H "Accept: application/json" \
    -d "title"="aut" \
    -d "body"="aut" \
    -d "price"="32" \
    -d "availability"="32" \
    -d "category_id"="32" \
    -d "date_available"="2007-10-23" \
    -d "model"="aut" \
    -d "quantity"="2019549556" \
    -d "sku"="aut" \
    -d "upc"="aut" \
    -d "ean"="aut" \
    -d "jan"="aut" \
    -d "isbn"="aut" \
    -d "mpn"="aut" \
    -d "length"="aut" \
    -d "width"="aut" \
    -d "height"="aut" \
    -d "meta_tag_title"="aut" \
    -d "meta_tag_description"="aut" \
    -d "meta_tag_keywords"="aut" \
    -d "sort_order"="2" \
    -d "weight"="aut" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/products/store",
    "method": "POST",
    "data": {
        "title": "aut",
        "body": "aut",
        "price": 32,
        "availability": 32,
        "category_id": 32,
        "date_available": "2007-10-23",
        "model": "aut",
        "quantity": 2019549556,
        "sku": "aut",
        "upc": "aut",
        "ean": "aut",
        "jan": "aut",
        "isbn": "aut",
        "mpn": "aut",
        "length": "aut",
        "width": "aut",
        "height": "aut",
        "meta_tag_title": "aut",
        "meta_tag_description": "aut",
        "meta_tag_keywords": "aut",
        "sort_order": 2,
        "weight": "aut"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST admin/products/store`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | Minimum: `2`
    body | string |  required  | Minimum: `20`
    price | numeric |  required  | 
    availability | integer |  required  | 
    category_id | integer |  required  | 
    date_available | date |  required  | 
    model | string |  optional  | Minimum: `2`
    quantity | numeric |  optional  | Minimum: `1`
    sku | string |  optional  | 
    upc | string |  optional  | 
    ean | string |  optional  | 
    jan | string |  optional  | 
    isbn | string |  optional  | 
    mpn | string |  optional  | 
    length | string |  optional  | Minimum: `1`
    width | string |  optional  | Minimum: `1`
    height | string |  optional  | Minimum: `1`
    meta_tag_title | string |  optional  | Minimum: `2`
    meta_tag_description | string |  optional  | Minimum: `5`
    meta_tag_keywords | string |  optional  | Minimum: `2`
    sort_order | numeric |  optional  | Maximum: `10`
    weight | string |  optional  | Minimum: `1`

<!-- END_b687d664dee76f87ffcc0eef82feade6 -->
<!-- START_d999a0d804502cabf3cae977c13974b2 -->
## Remove the specified article from storage.

> Example request:

```bash
curl "http://localhost/admin/products/delete/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/products/delete/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/products/delete/{id}`

`HEAD admin/products/delete/{id}`


<!-- END_d999a0d804502cabf3cae977c13974b2 -->
<!-- START_13598682548cee4f8f1e76a89f2b744a -->
## admin/products/select

> Example request:

```bash
curl "http://localhost/admin/products/select" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/products/select",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/products/select`

`HEAD admin/products/select`


<!-- END_13598682548cee4f8f1e76a89f2b744a -->
<!-- START_d9c70e085c1d52f209e2b3efa944b765 -->
## admin/reviews/index

> Example request:

```bash
curl "http://localhost/admin/reviews/index" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/reviews/index",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reviews/index`

`HEAD admin/reviews/index`


<!-- END_d9c70e085c1d52f209e2b3efa944b765 -->
<!-- START_716db87976ec67f26ebb8d4bc8af8986 -->
## admin/reviews/show/{id}

> Example request:

```bash
curl "http://localhost/admin/reviews/show/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/reviews/show/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reviews/show/{id}`

`HEAD admin/reviews/show/{id}`


<!-- END_716db87976ec67f26ebb8d4bc8af8986 -->
<!-- START_268fdce2d7aa635e4f2df3c2e5753a12 -->
## admin/reviews/delete/{id}

> Example request:

```bash
curl "http://localhost/admin/reviews/delete/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/reviews/delete/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reviews/delete/{id}`

`HEAD admin/reviews/delete/{id}`


<!-- END_268fdce2d7aa635e4f2df3c2e5753a12 -->
<!-- START_edc7a2283e9f1562e1516b8e1ddff253 -->
## admin/reviews/reply/review/{id}

> Example request:

```bash
curl "http://localhost/admin/reviews/reply/review/{id}" \
-H "Accept: application/json" \
    -d "reply_message"="voluptatem" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/reviews/reply/review/{id}",
    "method": "PUT",
    "data": {
        "reply_message": "voluptatem"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT admin/reviews/reply/review/{id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    reply_message | string |  required  | Minimum: `10`

<!-- END_edc7a2283e9f1562e1516b8e1ddff253 -->
<!-- START_e980835f6e0ef601bc887c139b64207d -->
## admin/reviews/delete/review/{id}

> Example request:

```bash
curl "http://localhost/admin/reviews/delete/review/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/reviews/delete/review/{id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE admin/reviews/delete/review/{id}`


<!-- END_e980835f6e0ef601bc887c139b64207d -->
<!-- START_b69e70fd6976128ba34a3e5269e0d1f0 -->
## admin/reviews/create/{productId}

> Example request:

```bash
curl "http://localhost/admin/reviews/create/{productId}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/reviews/create/{productId}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reviews/create/{productId}`

`HEAD admin/reviews/create/{productId}`


<!-- END_b69e70fd6976128ba34a3e5269e0d1f0 -->
<!-- START_7169bc61a8fafd1abe4d8353ded9505d -->
## admin/reviews/edit/{productId}

> Example request:

```bash
curl "http://localhost/admin/reviews/edit/{productId}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/reviews/edit/{productId}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reviews/edit/{productId}`

`HEAD admin/reviews/edit/{productId}`


<!-- END_7169bc61a8fafd1abe4d8353ded9505d -->
<!-- START_fafc2b3c0d6c1b5e6ce0b34c93be9003 -->
## admin/reviews/update/{productId}

> Example request:

```bash
curl "http://localhost/admin/reviews/update/{productId}" \
-H "Accept: application/json" \
    -d "review"="sapiente" \
    -d "hidden"="1" \
    -d "rating"="1325528582" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/reviews/update/{productId}",
    "method": "PUT",
    "data": {
        "review": "sapiente",
        "hidden": true,
        "rating": 1325528582
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT admin/reviews/update/{productId}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    review | string |  required  | Minimum: `25`
    hidden | boolean |  required  | 
    rating | numeric |  required  | Minimum: `0`

<!-- END_fafc2b3c0d6c1b5e6ce0b34c93be9003 -->
<!-- START_cbc8478833e08c0612f86c85a6728538 -->
## admin/reviews/store/{productId}

> Example request:

```bash
curl "http://localhost/admin/reviews/store/{productId}" \
-H "Accept: application/json" \
    -d "review"="sed" \
    -d "hidden"="1" \
    -d "rating"="872656883" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/reviews/store/{productId}",
    "method": "POST",
    "data": {
        "review": "sed",
        "hidden": true,
        "rating": 872656883
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST admin/reviews/store/{productId}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    review | string |  required  | Minimum: `25`
    hidden | boolean |  required  | 
    rating | numeric |  required  | Minimum: `0`

<!-- END_cbc8478833e08c0612f86c85a6728538 -->
<!-- START_42ce9e07ba9d9a4c898f6228fa3b8438 -->
## admin/reviews/toggle_visibility/{id}

> Example request:

```bash
curl "http://localhost/admin/reviews/toggle_visibility/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/reviews/toggle_visibility/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reviews/toggle_visibility/{id}`

`HEAD admin/reviews/toggle_visibility/{id}`


<!-- END_42ce9e07ba9d9a4c898f6228fa3b8438 -->
<!-- START_882cb923873e75870d5dffd716fec425 -->
## admin/reviews/markasread/productReview/{feed}

> Example request:

```bash
curl "http://localhost/admin/reviews/markasread/productReview/{feed}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/reviews/markasread/productReview/{feed}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reviews/markasread/productReview/{feed}`

`HEAD admin/reviews/markasread/productReview/{feed}`


<!-- END_882cb923873e75870d5dffd716fec425 -->
<!-- START_af224c03d2eae964d75f24044df2213b -->
## Display a listing of categories

> Example request:

```bash
curl "http://localhost/admin/categories" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/categories",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/categories`

`HEAD admin/categories`


<!-- END_af224c03d2eae964d75f24044df2213b -->
<!-- START_69efbd5ef9dc07ae76be68faccc0fc4f -->
## Show the form for creating a new category

> Example request:

```bash
curl "http://localhost/admin/categories/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/categories/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/categories/create`

`HEAD admin/categories/create`


<!-- END_69efbd5ef9dc07ae76be68faccc0fc4f -->
<!-- START_b83699f41c45b919da60d4d1bced9100 -->
## admin/categories/edit/{id}

> Example request:

```bash
curl "http://localhost/admin/categories/edit/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/categories/edit/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/categories/edit/{id}`

`HEAD admin/categories/edit/{id}`


<!-- END_b83699f41c45b919da60d4d1bced9100 -->
<!-- START_aa0f7cb2f2b129297b7b08e690e6857f -->
## admin/categories/update/{id}

> Example request:

```bash
curl "http://localhost/admin/categories/update/{id}" \
-H "Accept: application/json" \
    -d "name"="consectetur" \
    -d "parent_id"="367146" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/categories/update/{id}",
    "method": "PUT",
    "data": {
        "name": "consectetur",
        "parent_id": 367146
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT admin/categories/update/{id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    parent_id | integer |  optional  | 

<!-- END_aa0f7cb2f2b129297b7b08e690e6857f -->
<!-- START_3b11481f809f13f64d566b9586d928df -->
## Remove the specified category from storage.

> Example request:

```bash
curl "http://localhost/admin/categories/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/categories/{id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE admin/categories/{id}`


<!-- END_3b11481f809f13f64d566b9586d928df -->
<!-- START_673c5a74ec3581b8c4767472476411dd -->
## Remove the specified category from storage.

> Example request:

```bash
curl "http://localhost/admin/categories/delete/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/categories/delete/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/categories/delete/{id}`

`HEAD admin/categories/delete/{id}`


<!-- END_673c5a74ec3581b8c4767472476411dd -->
<!-- START_06b67c12e54d2d5b7a92e6711e5c7c20 -->
## admin/categories/store

> Example request:

```bash
curl "http://localhost/admin/categories/store" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/categories/store",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST admin/categories/store`


<!-- END_06b67c12e54d2d5b7a92e6711e5c7c20 -->
<!-- START_78613d2eccdf707faa4216ef9a4526f3 -->
## get category description for json

> Example request:

```bash
curl "http://localhost/admin/categories/description/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/categories/description/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/categories/description/{id}`

`HEAD admin/categories/description/{id}`


<!-- END_78613d2eccdf707faa4216ef9a4526f3 -->
<!-- START_61063f1ea27924ce86dcc1fac747ce33 -->
## admin/attribute_groups

> Example request:

```bash
curl "http://localhost/admin/attribute_groups" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/attribute_groups",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/attribute_groups`

`HEAD admin/attribute_groups`


<!-- END_61063f1ea27924ce86dcc1fac747ce33 -->
<!-- START_b49b34cb48807a7c2702546b5a978a8e -->
## admin/attribute_groups/create

> Example request:

```bash
curl "http://localhost/admin/attribute_groups/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/attribute_groups/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/attribute_groups/create`

`HEAD admin/attribute_groups/create`


<!-- END_b49b34cb48807a7c2702546b5a978a8e -->
<!-- START_ababb4a4eca700c59f77e6d5e93c1853 -->
## admin/attribute_groups/edit/{id}

> Example request:

```bash
curl "http://localhost/admin/attribute_groups/edit/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/attribute_groups/edit/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/attribute_groups/edit/{id}`

`HEAD admin/attribute_groups/edit/{id}`


<!-- END_ababb4a4eca700c59f77e6d5e93c1853 -->
<!-- START_613db4e4d4a3f53aa3b737fb795d8ae1 -->
## admin/attribute_groups/update/{id}

> Example request:

```bash
curl "http://localhost/admin/attribute_groups/update/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/attribute_groups/update/{id}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT admin/attribute_groups/update/{id}`


<!-- END_613db4e4d4a3f53aa3b737fb795d8ae1 -->
<!-- START_6981a87f8be5acecee0c3c7170a40d29 -->
## admin/attribute_groups/{id}

> Example request:

```bash
curl "http://localhost/admin/attribute_groups/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/attribute_groups/{id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE admin/attribute_groups/{id}`


<!-- END_6981a87f8be5acecee0c3c7170a40d29 -->
<!-- START_6a1a3a008c5c45a740179fed5ddae319 -->
## admin/attribute_groups/store

> Example request:

```bash
curl "http://localhost/admin/attribute_groups/store" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/attribute_groups/store",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST admin/attribute_groups/store`


<!-- END_6a1a3a008c5c45a740179fed5ddae319 -->
<!-- START_db986def58948d9a5f4c926a409395a4 -->
## admin/attribute_groups/delete/{id}

> Example request:

```bash
curl "http://localhost/admin/attribute_groups/delete/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/attribute_groups/delete/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/attribute_groups/delete/{id}`

`HEAD admin/attribute_groups/delete/{id}`


<!-- END_db986def58948d9a5f4c926a409395a4 -->
<!-- START_12d0d2373241e90ce2cb04afb2cf31f3 -->
## get groups name in json format

> Example request:

```bash
curl "http://localhost/admin/attribute_groups/groups/json" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/attribute_groups/groups/json",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/attribute_groups/groups/json`

`HEAD admin/attribute_groups/groups/json`


<!-- END_12d0d2373241e90ce2cb04afb2cf31f3 -->
<!-- START_3b7fa82d3d43b7601be29a7295669368 -->
## admin/attributes

> Example request:

```bash
curl "http://localhost/admin/attributes" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/attributes",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/attributes`

`HEAD admin/attributes`


<!-- END_3b7fa82d3d43b7601be29a7295669368 -->
<!-- START_d418f0b26df37301c213759732ca5930 -->
## admin/attributes/create

> Example request:

```bash
curl "http://localhost/admin/attributes/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/attributes/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/attributes/create`

`HEAD admin/attributes/create`


<!-- END_d418f0b26df37301c213759732ca5930 -->
<!-- START_bf5b50c76da73c30edc9ac572aa63019 -->
## admin/attributes/edit/{id}

> Example request:

```bash
curl "http://localhost/admin/attributes/edit/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/attributes/edit/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/attributes/edit/{id}`

`HEAD admin/attributes/edit/{id}`


<!-- END_bf5b50c76da73c30edc9ac572aa63019 -->
<!-- START_b87075bffa6418cdc8849d0e41fd0b41 -->
## admin/attributes/update/{id}

> Example request:

```bash
curl "http://localhost/admin/attributes/update/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/attributes/update/{id}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT admin/attributes/update/{id}`


<!-- END_b87075bffa6418cdc8849d0e41fd0b41 -->
<!-- START_1876566e42e0f2d3fbbf5b8fcf6e4f2b -->
## admin/attributes/{id}

> Example request:

```bash
curl "http://localhost/admin/attributes/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/attributes/{id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE admin/attributes/{id}`


<!-- END_1876566e42e0f2d3fbbf5b8fcf6e4f2b -->
<!-- START_f2c1d0955c7e49b225b87a2e41bd9020 -->
## admin/attributes/store

> Example request:

```bash
curl "http://localhost/admin/attributes/store" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/attributes/store",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST admin/attributes/store`


<!-- END_f2c1d0955c7e49b225b87a2e41bd9020 -->
<!-- START_1bc4f66568dce5eef4f9b6de08ee4a55 -->
## admin/attributes/delete/{id}

> Example request:

```bash
curl "http://localhost/admin/attributes/delete/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/attributes/delete/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/attributes/delete/{id}`

`HEAD admin/attributes/delete/{id}`


<!-- END_1bc4f66568dce5eef4f9b6de08ee4a55 -->
<!-- START_0316c446c65a873afdd71f488f11c638 -->
## get groups name in json format

> Example request:

```bash
curl "http://localhost/admin/attributes/attrs/json" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/attributes/attrs/json",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/attributes/attrs/json`

`HEAD admin/attributes/attrs/json`


<!-- END_0316c446c65a873afdd71f488f11c638 -->
<!-- START_b7cb6851a250cb72664bc956a4c5fe6c -->
## admin/subscribers

> Example request:

```bash
curl "http://localhost/admin/subscribers" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/subscribers",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/subscribers`

`HEAD admin/subscribers`


<!-- END_b7cb6851a250cb72664bc956a4c5fe6c -->
<!-- START_471817814080dfa48dba1762823c5d58 -->
## admin/subscribers/show/{uid}

> Example request:

```bash
curl "http://localhost/admin/subscribers/show/{uid}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/subscribers/show/{uid}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/subscribers/show/{uid}`

`HEAD admin/subscribers/show/{uid}`


<!-- END_471817814080dfa48dba1762823c5d58 -->
<!-- START_147d3c587c153965c6f80f0cc94b0a9c -->
## admin/subscribers/show_user/{user}

> Example request:

```bash
curl "http://localhost/admin/subscribers/show_user/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/subscribers/show_user/{user}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/subscribers/show_user/{user}`

`HEAD admin/subscribers/show_user/{user}`


<!-- END_147d3c587c153965c6f80f0cc94b0a9c -->
<!-- START_c906f2dfbee6a226ca66522b1013d887 -->
## admin/subscribers/generate/{newsList_id}

> Example request:

```bash
curl "http://localhost/admin/subscribers/generate/{newsList_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/subscribers/generate/{newsList_id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/subscribers/generate/{newsList_id}`

`HEAD admin/subscribers/generate/{newsList_id}`


<!-- END_c906f2dfbee6a226ca66522b1013d887 -->
<!-- START_ed86a8fd09b32fa5c6ee5420129d46b9 -->
## admin/subscribers/tmp_mail/{file}

> Example request:

```bash
curl "http://localhost/admin/subscribers/tmp_mail/{file}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/subscribers/tmp_mail/{file}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/subscribers/tmp_mail/{file}`

`HEAD admin/subscribers/tmp_mail/{file}`


<!-- END_ed86a8fd09b32fa5c6ee5420129d46b9 -->
<!-- START_b7bbc44e3175bb945a3b6b6e708dd240 -->
## admin/subscribers/history_mail/{folder}/{filename}

> Example request:

```bash
curl "http://localhost/admin/subscribers/history_mail/{folder}/{filename}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/subscribers/history_mail/{folder}/{filename}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET admin/subscribers/history_mail/{folder}/{filename}`

`HEAD admin/subscribers/history_mail/{folder}/{filename}`


<!-- END_b7bbc44e3175bb945a3b6b6e708dd240 -->
<!-- START_61f8ea691988807c81881b164c811558 -->
## admin/subscribers/generate/{uid}/{type}

> Example request:

```bash
curl "http://localhost/admin/subscribers/generate/{uid}/{type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/subscribers/generate/{uid}/{type}",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST admin/subscribers/generate/{uid}/{type}`


<!-- END_61f8ea691988807c81881b164c811558 -->
<!-- START_0e0c7a107d93448fec9a18d33089d2a7 -->
## admin/mail

> Example request:

```bash
curl "http://localhost/admin/mail" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/mail",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/mail`

`HEAD admin/mail`


<!-- END_0e0c7a107d93448fec9a18d33089d2a7 -->
<!-- START_9e590a6cee683df079e50fd2c62a99bf -->
## admin/mail/show/{uid}

> Example request:

```bash
curl "http://localhost/admin/mail/show/{uid}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/mail/show/{uid}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/mail/show/{uid}`

`HEAD admin/mail/show/{uid}`


<!-- END_9e590a6cee683df079e50fd2c62a99bf -->
<!-- START_a58fca11f5de60861aabb27866d57f04 -->
## admin/mail/create

> Example request:

```bash
curl "http://localhost/admin/mail/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/mail/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/mail/create`

`HEAD admin/mail/create`


<!-- END_a58fca11f5de60861aabb27866d57f04 -->
<!-- START_3a8ec6216883c5e95525ac4c85057926 -->
## admin/mail/templates

> Example request:

```bash
curl "http://localhost/admin/mail/templates" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/mail/templates",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/mail/templates`

`HEAD admin/mail/templates`


<!-- END_3a8ec6216883c5e95525ac4c85057926 -->
<!-- START_9f48ac2547e8b666ecbd2228effafe46 -->
## admin/campaign

> Example request:

```bash
curl "http://localhost/admin/campaign" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/campaign",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/campaign`

`HEAD admin/campaign`


<!-- END_9f48ac2547e8b666ecbd2228effafe46 -->
<!-- START_c6e7b39baae21575e6e8b32ebc8d5589 -->
## admin/campaign/show/{uid}

> Example request:

```bash
curl "http://localhost/admin/campaign/show/{uid}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/campaign/show/{uid}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/campaign/show/{uid}`

`HEAD admin/campaign/show/{uid}`


<!-- END_c6e7b39baae21575e6e8b32ebc8d5589 -->
<!-- START_85f0fe1713038f193aab5db3cde82217 -->
## admin/campaign/subscriber/{user}

> Example request:

```bash
curl "http://localhost/admin/campaign/subscriber/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/campaign/subscriber/{user}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/campaign/subscriber/{user}`

`HEAD admin/campaign/subscriber/{user}`


<!-- END_85f0fe1713038f193aab5db3cde82217 -->
<!-- START_44d55ff9fa7a4d915dc3e09126552258 -->
## admin/campaign/generate/{Campaign}

> Example request:

```bash
curl "http://localhost/admin/campaign/generate/{Campaign}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/campaign/generate/{Campaign}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/campaign/generate/{Campaign}`

`HEAD admin/campaign/generate/{Campaign}`


<!-- END_44d55ff9fa7a4d915dc3e09126552258 -->
<!-- START_08ee350317ec94f5ac58a6aafcfb4542 -->
## admin/campaign/tmp_mail/{file}

> Example request:

```bash
curl "http://localhost/admin/campaign/tmp_mail/{file}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/campaign/tmp_mail/{file}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/campaign/tmp_mail/{file}`

`HEAD admin/campaign/tmp_mail/{file}`


<!-- END_08ee350317ec94f5ac58a6aafcfb4542 -->
<!-- START_a0432ff62575fddbdb550cc4037861b9 -->
## admin/campaign/history_mail/{folder}/{filename}

> Example request:

```bash
curl "http://localhost/admin/campaign/history_mail/{folder}/{filename}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/campaign/history_mail/{folder}/{filename}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET admin/campaign/history_mail/{folder}/{filename}`

`HEAD admin/campaign/history_mail/{folder}/{filename}`


<!-- END_a0432ff62575fddbdb550cc4037861b9 -->
<!-- START_25c8b5de9742472e2142ec37e573f7a9 -->
## admin/campaign/generate/{uid}/{type}

> Example request:

```bash
curl "http://localhost/admin/campaign/generate/{uid}/{type}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/campaign/generate/{uid}/{type}",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST admin/campaign/generate/{uid}/{type}`


<!-- END_25c8b5de9742472e2142ec37e573f7a9 -->
<!-- START_164e64629b74ccaa13618d0296ac8831 -->
## get groups name in json format

> Example request:

```bash
curl "http://localhost/admin/campaign/groups/json" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/campaign/groups/json",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET admin/campaign/groups/json`

`HEAD admin/campaign/groups/json`


<!-- END_164e64629b74ccaa13618d0296ac8831 -->
<!-- START_91fc5c1cbfd77f2ac5925ca7917d1d89 -->
## admin/audits/show/{model}/{id}

> Example request:

```bash
curl "http://localhost/admin/audits/show/{model}/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/audits/show/{model}/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET admin/audits/show/{model}/{id}`

`HEAD admin/audits/show/{model}/{id}`


<!-- END_91fc5c1cbfd77f2ac5925ca7917d1d89 -->
<!-- START_24dd78105fe940868ceadaa05d9b7a83 -->
## Show the dashboard.

> Example request:

```bash
curl "http://localhost/admin/log-viewer" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/log-viewer",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET admin/log-viewer`

`HEAD admin/log-viewer`


<!-- END_24dd78105fe940868ceadaa05d9b7a83 -->
<!-- START_8dcba4f901c81f5afc54e251b1dfad69 -->
## List all logs.

> Example request:

```bash
curl "http://localhost/admin/log-viewer/logs" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/log-viewer/logs",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET admin/log-viewer/logs`

`HEAD admin/log-viewer/logs`


<!-- END_8dcba4f901c81f5afc54e251b1dfad69 -->
<!-- START_7cde8b9c4f4db0ebcc26d671f25a88fd -->
## Delete a log.

> Example request:

```bash
curl "http://localhost/admin/log-viewer/logs/delete" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/log-viewer/logs/delete",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE admin/log-viewer/logs/delete`


<!-- END_7cde8b9c4f4db0ebcc26d671f25a88fd -->
<!-- START_950cfeb2be9e81bc7724015f42045467 -->
## Show the log.

> Example request:

```bash
curl "http://localhost/admin/log-viewer/{date}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/log-viewer/{date}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET admin/log-viewer/{date}`

`HEAD admin/log-viewer/{date}`


<!-- END_950cfeb2be9e81bc7724015f42045467 -->
<!-- START_e4ebde183bc8b1007e7c2b2ab3ad96c7 -->
## Download the log

> Example request:

```bash
curl "http://localhost/admin/log-viewer/{date}/download" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/log-viewer/{date}/download",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET admin/log-viewer/{date}/download`

`HEAD admin/log-viewer/{date}/download`


<!-- END_e4ebde183bc8b1007e7c2b2ab3ad96c7 -->
<!-- START_50a13a5067f6fe7dd03a96a240eafe82 -->
## Filter the log entries by level.

> Example request:

```bash
curl "http://localhost/admin/log-viewer/{date}/{level}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/log-viewer/{date}/{level}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET admin/log-viewer/{date}/{level}`

`HEAD admin/log-viewer/{date}/{level}`


<!-- END_50a13a5067f6fe7dd03a96a240eafe82 -->
<!-- START_0acce8c4b6cee0c0863dccdc913b0ce5 -->
## _debugbar/open

> Example request:

```bash
curl "http://localhost/_debugbar/open" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/_debugbar/open",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET _debugbar/open`

`HEAD _debugbar/open`


<!-- END_0acce8c4b6cee0c0863dccdc913b0ce5 -->
<!-- START_5f5807046c0317783733a24f83f5a2a5 -->
## Return Clockwork output

> Example request:

```bash
curl "http://localhost/_debugbar/clockwork/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/_debugbar/clockwork/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET _debugbar/clockwork/{id}`

`HEAD _debugbar/clockwork/{id}`


<!-- END_5f5807046c0317783733a24f83f5a2a5 -->
<!-- START_2f9359e2dcdcc380f3e8a2bec1b66599 -->
## Return the stylesheets for the Debugbar

> Example request:

```bash
curl "http://localhost/_debugbar/assets/stylesheets" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/_debugbar/assets/stylesheets",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET _debugbar/assets/stylesheets`

`HEAD _debugbar/assets/stylesheets`


<!-- END_2f9359e2dcdcc380f3e8a2bec1b66599 -->
<!-- START_c18b6bc464bab9bc47e059bb494bba0c -->
## Return the javascript for the Debugbar

> Example request:

```bash
curl "http://localhost/_debugbar/assets/javascript" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/_debugbar/assets/javascript",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET _debugbar/assets/javascript`

`HEAD _debugbar/assets/javascript`


<!-- END_c18b6bc464bab9bc47e059bb494bba0c -->
