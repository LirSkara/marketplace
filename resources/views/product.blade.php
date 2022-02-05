@extends('layouts.layout')
@section('title')Страница товара@endsection
@section('main_content')
<div class="container">
    <nav aria-label="breadcrumb custom-cr">
        <ol class="breadcrumb crumb-custom">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="/">Компьютеры</a></li>
            <li class="breadcrumb-item active" aria-current="page">MSI Summit E13 A11MT-205RU</li>
        </ol>
    </nav>
    <div class="bg-white my-3 p-3">
        <div class="my-5">
            <div class="row p-0">
                <div class="col-12 col-lg-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://c.dns-shop.ru/thumb/st4/fit/0/0/028f6e4fc8bffdfbf6438908f592563d/3763acdf7683b72f74bd935bb992da3ec97e0ad757b0e81857ef0c2207baf327.jpg" class="d-block carusel-image" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon fs-1" aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon fs-1" aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                    <h1>MSI Summit E13 A11MT-205RU</h1>
                    <h2 class="fs-4 fw-light">1920x1200, IPS, Intel Core i7 1185G7, 4 ядер х 3 ГГц, RAM 16 ГБ, SSD 1000 ГБ, Intel Iris Xe Graphics , Wi-Fi, Windows 10 Pro</h2>
                    <div class="row mt-1">
                        <div class="col-12 col-lg-6">
                            <span class="fs-2">129 999 ₽</span>
                        </div>
                        <div class="col-12 col-lg-6 mt-2 mt-lg-0">
                            <button class="btn btn-lg btn-darksuccess btn-custom"><i class="bi bi-bag-plus"></i> Добавить в корзину</button>
                        </div>
                    </div>
                </div>
                <div class="border-top mt-3 pt-2">
                    <div class="fw-bold">Описание</div>
                    <div class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, aut.</div>
                    <div class="fw-bold mt-3">Параметры</div>
                    <div class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, aut.</div>
                </div>
                <div class="border-top mt-3 pt-2">
                    <div class="fw-bold">Наличие</div>
                    <div class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, aut.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-light rounded border p-3">
        <div class="row mb-3">
            <div class="col">
                <div class="fs-5">Отзывы: 2</div>
            </div>
            <div class="col text-end">
                <div><i class="bi bi-star-fill text-darksuccess me-1"></i><i class="bi bi-star-fill text-darksuccess me-1"></i><i class="bi bi-star-fill text-darksuccess me-1"></i><i class="bi bi-star-fill text-darksuccess me-1"></i><i class="bi bi-star-fill text-darksuccess"></i></div>
            </div>
        </div>
        <div class="alert alert-light shadow-sm" role="alert">
            <div class="row">
                <div class="col-2"><img src="/storage/avatars/User_ID_1_833fd08efa2131a0dbe41229a66ee83f.jpg" alt="mdo" class="rounded-circle" width="42" height="42"></div>
                <div class="col">
                    <div style="position:relative;top: -6px;">
                        <span class="alert-heading fs-5 ms-2">Диана Рукевич</span>
                        <div class="ms-2" style="font-size: 9pt;"><i class="bi bi-star-fill text-darksuccess me-1"></i><i class="bi bi-star-fill text-darksuccess me-1"></i><i class="bi bi-star-fill text-darksuccess me-1"></i><i class="bi bi-star-fill text-darksuccess me-1"></i><i class="bi bi-star-fill text-darksuccess"></i></div>
                    </div>

                </div>
            </div>

            <p class="small">Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
        </div>
        <div class="alert alert-light shadow-sm" role="alert">
            <div class="row">
                <div class="col-2"><img src="/storage/avatars/User_ID_1_833fd08efa2131a0dbe41229a66ee83f.jpg" alt="mdo" class="rounded-circle" width="42" height="42"></div>
                <div class="col">
                    <div style="position:relative;top: -6px;">
                        <span class="alert-heading fs-5 ms-2">Дмитрий Кастрин</span>
                        <div class="ms-2" style="font-size: 9pt;"><i class="bi bi-star-fill text-darksuccess me-1"></i><i class="bi bi-star-fill text-darksuccess me-1"></i><i class="bi bi-star-fill text-darksuccess me-1"></i><i class="bi bi-star-fill text-darksuccess me-1"></i><i class="bi bi-star-fill text-darksuccess"></i></div>
                    </div>

                </div>
            </div>

            <p class="small">Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
        </div>
    </div>
</div>
@endsection