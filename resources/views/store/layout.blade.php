<!doctype html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/main.css">

    <link rel="icon" href="/favicon.png" sizes="32x32">
    <link rel="icon" href="/favicon.png" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="/favicon.png">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <meta name="theme-color" content="#156f7e">

    <title>@yield('title')</title>
</head>

<body class="bg-white pt-5 mt-3">
    <header class="shadow-sm bg-white fixed-top" style="z-index: 2000;">
        <div class="container">
            <div class="row bg-darksuccess text-white py-2">
                <div class="col-3 text-start px-0">
                    <button id="menu" class="fs-2 btn btn-none py-0 text-white" data-bs-toggle="modal" data-bs-target="#exampleModalmenu"><i id="men" class="fa fa-bars" aria-hidden="true"></i></button>
                </div>
                <a href="/store" class="col-6 fs-4 pt-1 text-center text-white text-decoration-none">STORE</a>
                <div class="col-3 text-end px-0">
                    <a href="/cabinet" class="fs-2 btn btn-none py-0 text-white"><i class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </header>
    @yield('main_content')
    <div class="mb-5"></div>

    <!-- Начало модального окна меню -->
    <div class="modal fade" id="exampleModalmenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-body pt-0 px-0">
                    <div class="container mt-2 px-0 pt-5">
                        <ul class="list-group">
                            <li class="list-group-item bg-light border-0 px-3 py-1 border-top rounded-0">
                                <a href="/store" class="text-dark text-decoration-none d-flex py-2"><span class="my-auto"><i class="bi bi-newspaper me-1"></i> Главная страница</span></a>
                            </li>
                            <li class="list-group-item bg-light border-0 px-3 py-1 border-top rounded-0">
                                <a href="/store/products/" class="text-dark text-decoration-none d-flex py-2"><span class="my-auto"><i class="bi bi-newspaper me-1"></i> Мои товары</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Конец модального окна меню -->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
</body>

</html>