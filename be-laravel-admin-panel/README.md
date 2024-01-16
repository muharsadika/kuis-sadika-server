# API EndPoints

## Question & Avatar
## ________________________

## Questions
##### Get all Question

-   URL: `/api/questions`
-   Method: GET
-   Description: Get all questions
-   Require token: `No`
-   Response

```
{
     "status": 200,
    "success": true,
    "message": "List questions",
    "data": [
        {
            "id": 1,
            "question": "Di rumah makan padang, selain pakai sendok kita makan pakai?",
            "answer": "Tenaga",
            "created_at": "13-11-2023 00:00:00",
            "updated_at": "14-11-2023 03:38:38"
        },
        {
            "id": 2,
            "question": "Selain mobil, bus atau pesawat, orang pergi dari Jakarta ke Surabaya biasanya menggunakan?",
            "answer": "Celana",
            "created_at": "13-11-2023 00:00:00",
            "updated_at": "13-11-2023 00:00:00"
        },
        {
            "id": 3,
            "question": "Biasa digunakan untuk menyalakan atau mematikan TV dan AC?",
            "answer": "Tolong",
            "created_at": "13-11-2023 00:00:00",
            "updated_at": "13-11-2023 00:00:00"
        },
        {
            "id": 4,
            "question": "Seseorang yang memimpin sebuah desa, biasanya dipanggil pak?",
            "answer": "Noleh",
            "created_at": "13-11-2023 00:00:00",
            "updated_at": "13-11-2023 00:00:00"
        },
        ...
    ]
}
```

#### Get Question by ID

-   URL: `/api/questions/:questionId`
-   Method: GET
-   Description: Get question by ID
-   Require token: `No`
-   Response

```
{
    "status": 200,
    "success": true,
    "message": "Detail question",
    "data": {
        "id": 1,
        "question": "Di rumah makan padang, selain pakai sendok kita makan pakai?",
        "answer": "Tenaga",
        "created_at": "13-11-2023 00:00:00",
        "updated_at": "14-11-2023 03:38:38"
    }
}
```

## Avatar
##### Get all Avatar

-   URL: `/api/avatars`
-   Method: GET
-   Description: Get all avatars
-   Require token: `No`
-   Response

```
{
    "status": 200,
    "success": true,
    "message": "List avatar",
    "data": [
        {
            "id": 9,
            "avatar_url": "https://res.cloudinary.com/dkmqwtk1z/image/upload/v1700100937/mikir-app/free-boy_lun8ml.png",
            "avatar_name": "free-boy",
            "avatar_price": 0,
            "created_at": "15-11-2023 03:58:21",
            "updated_at": "15-11-2023 03:58:21"
        },
        {
            "id": 10,
            "avatar_url": "https://res.cloudinary.com/dkmqwtk1z/image/upload/v1700100938/mikir-app/free-girl_og6gsi.png",
            "avatar_name": "free-girl",
            "avatar_price": 0,
            "created_at": "15-11-2023 04:08:08",
            "updated_at": "15-11-2023 04:08:08"
        },
        {
            "id": 3,
            "avatar_url": "https://res.cloudinary.com/dkmqwtk1z/image/upload/v1700100937/mikir-app/boy-3_g9tmba.png",
            "avatar_name": "boy-3",
            "avatar_price": 100,
            "created_at": "15-11-2023 03:55:32",
            "updated_at": "15-11-2023 03:55:32"
        },
        {
            "id": 4,
            "avatar_url": "https://res.cloudinary.com/dkmqwtk1z/image/upload/v1700100938/mikir-app/girl-1_k3sjaz.png",
            "avatar_name": "girl-1",
            "avatar_price": 100,
            "created_at": "15-11-2023 03:56:33",
            "updated_at": "15-11-2023 03:56:33"
        },
        ...
    ]
}
```

#### Get Avatar by ID

-   URL: `/api/avatars/:avatarId`
-   Method: GET
-   Description: Get avatar by ID
-   Require token: `No`
-   Response

```
{
    "status": 200,
    "success": true,
    "message": "Detail avatar",
    "data": {
        "id": 1,
        "avatar_url": "https://res.cloudinary.com/dkmqwtk1z/image/upload/v1700100938/mikir-app/boy-1_ampeln.png",
        "avatar_name": "boy-1",
        "avatar_price": 100,
        "created_at": "15-11-2023 03:55:00",
        "updated_at": "15-11-2023 03:55:00"
    }
}
```
