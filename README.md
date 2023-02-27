

## About api
```
What's an API?
An API is a set of definitions and protocols for building and integrating application software. It’s sometimes referred to as a contract between an information provider and an information user—establishing the content required from the consumer (the call) and the content required by the producer (the response). 

Laravel is accessible, powerful, and provides tools required for large, robust applications.
```
### REST
```
    REST is a set of architectural constraints, not a protocol or a standard. API developers can implement REST in a variety of ways.
    When a client request is made via a RESTful API, it transfers a representation of the state of the resource to the requester or endpoint. This information, or representation, is delivered in one of several formats via HTTP: JSON (Javascript Object Notation), HTML, XLT, Python, PHP, or plain text. JSON is the most generally popular file format to use because, despite its name, it’s language-agnostic, as well as readable by both humans and machines. 
```
## Learning Laravel



## Contributors
```
RedOuaneAO
moussafia
Amine
Nadir
```

## register
** method : post
** endpoint : /register
** inputs : 
            name: exampl
            email: example@gmail.com
            password : ******

** output :
            {
    "status": "success",
    "user": {
        "id": 6,
        "name": "exampl",
        "role": 0,
        "email": "example@gmail.com",
        "email_verified_at": null,
        "created_at": "2023-02-26T16:20:27.000000Z",
        "updated_at": "2023-02-26T16:20:27.000000Z"
    },
    "authorisation": {
        "token": "token",
        "type": "bearer"
    }
}
## login
** method : post
** endpoint : /login
** inputs : 
            email: example@gmail.com
            password : ******

** output :
            {
    "status": "success",
    "user": {
        "id": 6,
        "name": "exampl",
        "role": 0,
        "email": "example@gmail.com",
        "email_verified_at": null,
        "created_at": "2023-02-26T16:20:27.000000Z",
        "updated_at": "2023-02-26T16:20:27.000000Z"
    },
    "authorisation": {
        "token": "token",
        "type": "bearer"
    }
}


