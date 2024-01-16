<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>

<body class="bg-white">
    {{-- <div style="
        text-align: center; 
        align-items: center; 
        justify-content: center; 
        margin-top: 300px;
        display: flex;
        flex-direction: column;
        gap: 10px
    "> --}}
    {{-- <button type="button" class="btn btn-primary"><a href="{{ route('avatars.index') }}" st>Avatar</a></button> --}}
    {{-- <button type="button" class="btn btn-primary" href="{{ route('questions.index') }}">Button</button> --}}
    {{-- <a href="{{ route('avatars.index') }}" class="btn btn-sm btn-primary">Avatar</a>
        <a href="{{ route('questions.index') }}" class="btn btn-sm btn-primary">Question</a>
    </div> --}}
    <style>
        .nav-link-custom {
            color: black !important;
        }

        .nav-link-custom.active {
            color: white !important;
        }
    </style>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 200px; height: 100vh; position: fixed">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <div>
                <p class="fs-5 fw-bold">Mikir App</p>
                <p class="fs-5" style="margin-top: -20px">Admin Dashboard</p>
            </div>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto mt-3">
            <li class="nav-item">
                <a href="{{ route('questions.index') }}"
                    class="nav-link nav-link-custom {{ Route::currentRouteName() == 'questions.index' ? 'active' : '' }}">
                    Question
                </a>
            </li>
            <li>
                <a href="{{ route('avatars.index') }}"
                    class="nav-link nav-link-custom {{ Route::currentRouteName() == 'avatars.index' ? 'active' : '' }}">
                    Avatar
                </a>
            </li>
            <li>
                <a href="{{ route('diamonds.index') }}"
                    class="nav-link nav-link-custom {{ Route::currentRouteName() == 'diamonds.index' ? 'active' : '' }}">
                    Diamond
                </a>
            </li>
            {{-- <li>
                <a href="#" class="nav-link link-dark dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li> --}}
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle mb-3"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://img.freepik.com/free-vector/illustration-businessman_53876-5856.jpg?w=740&t=st=1700906038~exp=1700906638~hmac=0e7634e262ff3b663fbf0ea03c136d34467b9a26de21b79fd71e0b9d0b5d9f5a"
                    alt="" width="50" height="50" class="rounded-circle me-2 border">
                <strong>Admin</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
