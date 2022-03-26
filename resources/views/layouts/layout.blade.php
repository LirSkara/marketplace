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

<body class="bg-white pt-5">
    <header class="bg-white fixed-top mx-auto" style="z-index: 5000;">
        <div class="container-fluid">
            <div class="row bg-darksuccess text-white py-2 px-lg-5  ">
                <div class="col-3 col-lg-1 text-start width-col-start px-0">
                    <button onclick="menu(this.id)" id="menu" class="fs-2 btn btn-none py-0 text-white" data-bs-toggle="modal" data-bs-target="#exampleModalmenu"><i id="men" class="fa fa-bars" aria-hidden="true"></i></button>
                </div>
                <a href="/" class="col-6 col-lg-2 fs-2 col-center text-white text-decoration-none">MARKETPLACE</a>
                <div class="col-3 col-lg-9 text-end width-col-end px-0">
                    <input type="search" oninput="s_line(this.id)" id="search" class="header-search py-2 px-4 shadow-sm me-5" placeholder="Я ищу..." data-bs-toggle="modal" data-bs-target="#staticBackdropsearch">
                    @if(Auth::check())
                        <a id="cabinet" href="/cabinet" class="fs-2 btn py-0 text-white display-top-icon"><i class="bi bi-person-fill"></i></a>
                    @else
                        <a id="sign_in" href="/login" class="fs-2 btn py-0 text-white display-top-icon"><i class="bi bi-person-fill"></i></a>
                    @endif              
                    <a id="heart" href="/favorites" class="fs-2 btn py-0 text-white display-top-icon"><i class="bi bi-bookmark-heart"></i></a>
                    <a id="cart" href="/cart" class="fs-2 btn py-0 text-white display-top-icon"><i class="bi bi-cart4"></i></a>
                    <button class="fs-2 btn btn-none py-0 text-white display-top-search" data-bs-toggle="modal" data-bs-target="#staticBackdropsearch"><i class="fa fa-search me-1" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </header>
    <div class="fixed-bottom mx-auto display-header-bottom" style="z-index: 2000;">
        <div class="bg-light py-2 border-top">
            <div class="row text-center fs-2">
                <a id="home" href="/" class="col text-muted"><i class="bi bi-house"></i></a>
                <a onclick="catalog(this.id)" id="catalog" class="col text-muted" style="cursor: pointer;"><i class="bi bi-menu-button-wide-fill"></i></a>
                @if(Auth::check())
                <a id="cabinet" href="/cabinet" class="col text-white bg-darksuccess rounded"><i class="bi bi-person-fill"></i></a>
                @else
                <a id="sign_in" href="/login" class="col text-muted"><i class="bi bi-person-fill"></i></a>
                @endif
                <a id="heart" href="/favorites" class="col text-muted"><i class="bi bi-bookmark-heart"></i></a>
                <a id="cart" href="/cart" class="col text-muted"><i class="bi bi-cart4"></i></a>
            </div>
        </div>
    </div>
    <div class="mt-3 mt-lg-0"></div>
    @yield('main_content')
    <div class="mb-5"></div>

    <!-- Начало модального окна меню -->
    <div class="modal fade" id="exampleModalmenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down" style="position: fixed; left: 0px; min-width: 400px;">
            <div class="modal-content rounded-5 shadow">
                <div class="modal-body pt-0 px-0">
                    <div class="container mt-3 pt-5 px-1">
                        <ul class="list-group">

                            @foreach($menu_categories as $item)
                            <li class="list-group-item border-0 px-0 py-0">
                                <a class="text-dark text-decoration-none d-flex py-2 bg-light px-2 rounded-3 mb-1" data-bs-toggle="collapse" href="#cat{{$item->id}}" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="{{$item->icon}} text-muted fs-4 text-muted me-2"></i>
                                    <span style="position: relative; top:4px;">{{$item->name}}</span>
                                    <i class="bi bi-chevron-down text-muted ms-auto my-auto fs-5"></i>
                                </a>
                                <div class="collapse show" id="cat{{$item->id}}">
                                @foreach($puncts as $punct)
                                    @if($punct->category == $item->id)
                                    <a href="/category/{{$punct->id}}" class="px-3 text-dark text-decoration-none d-flex py-2">
                                        {{$punct->name}}
                                    </a>
                                    @endif
                                @endforeach
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="d-flex flex-column bg-light px-0 pb-5 pt-3 px-3">
                        <div class="mb-2">
                            <img class="flag-custom" src="https://otvet.imgsmail.ru/download/44d40600699e0fdbcb126cb2b3e34b8b_h-1142.jpg" alt="...">
                            <span class="">Россия</span>, <span class="">Дербент</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Конец модального окна меню -->

    <!-- Начало модального окна поиск -->
    <div class="modal fade search-index" id="staticBackdropsearch" data-bs-backdrop="true" data-bs-keyboard="false" tabindex="" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down modal-search">
            <div class="modal-content rounded-5 shadow">
                <div class="modal-body pt-0">
                    <div class="container mt-3 px-0">
                        <div class="d-flex display-modal-search">
                            <input id="search" type="text" class="search-custom">
                            <button id="close_custom" class="item-custom btn btn-none="><i id="itemclose" class="bi bi-search text-muted itemposition-custom"></i></button>
                            <div><button class="btn btn-none text-darksuccess" data-bs-dismiss="modal" aria-label="Close">Отмена</button></div>
                        </div>
                        <div id="search_area"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Конец модального окна поиск -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
    <script src="/js/ajax.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>