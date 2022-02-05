@extends('layouts.layout')
@section('title')Избранное@endsection
@section('main_content')
<div class="container">
    <nav aria-label="breadcrumb custom-cr">
        <ol class="breadcrumb crumb-custom">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="/cabinet">Кабинет</a></li>
            <li class="breadcrumb-item active" aria-current="page">Доставка</li>
        </ol>
    </nav>
    <h1 class="fs-2">Мои доставки</h1>
    <div class="bg-light my-3 rounded-3 shadow-sm border">
        <div class="row p-2">
            <div class="col text-muted">Заказ №123 | <span class="text-success">Доставка</span></div>
            <div class="col-2 text-end">
                <i class="bi bi-three-dots-vertical"></i>
            </div>
        </div>
        <div class="p-2">
            <div>г. Дербент, Пушкина 12</div>
            <div class="text-muted">Время: от 16:00, до 20:00 по МСК</div>
        </div>
        <ul class="d-flex list-unstyled p-3 scroll-none">
            <li class="me-2">
                <div class="mb-2 small" style="width: 8rem;">
                    <a href="/product" class="text-decoration-none text-dark">
                        <div class="text-center"><img class="img-width-one" src="https://images.wbstatic.net/big/new/5610000/5616296-1.jpg" alt="..."></div>
                        <div class="mt-2"><span class="fw-bold me-2">12 475 ₽</span></div>
                        <div class="text-muted">Philips / Пылесос сухая / FC9733/01</div>
                    </a>
                </div>
            </li>
            <li class="me-2">
                <div class="mb-2 small" style="width: 8rem;">
                    <a href="/product" class="text-decoration-none text-dark">
                        <div class="text-center"><img class="img-width-one" src="https://images.wbstatic.net/big/new/5610000/5616296-1.jpg" alt="..."></div>
                        <div class="mt-2"><span class="fw-bold me-2">12 475 ₽</span></div>
                        <div class="text-muted">Philips / Пылесос сухая / FC9733/01</div>
                    </a>
                </div>
            </li>
            <li class="me-2">
                <div class="mb-2 small" style="width: 8rem;">
                    <a href="/product" class="text-decoration-none text-dark">
                        <div class="text-center"><img class="img-width-one" src="https://images.wbstatic.net/big/new/5610000/5616296-1.jpg" alt="..."></div>
                        <div class="mt-2"><span class="fw-bold me-2">12 475 ₽</span></div>
                        <div class="text-muted">Philips / Пылесос сухая / FC9733/01</div>
                    </a>
                </div>
            </li>
            <li class="me-2">
                <div class="mb-2 small" style="width: 8rem;">
                    <a href="/product" class="text-decoration-none text-dark">
                        <div class="text-center"><img class="img-width-one" src="https://images.wbstatic.net/big/new/5610000/5616296-1.jpg" alt="..."></div>
                        <div class="mt-2"><span class="fw-bold me-2">12 475 ₽</span></div>
                        <div class="text-muted">Philips / Пылесос сухая / FC9733/01</div>
                    </a>
                </div>
            </li>
        </ul>
        <div class="border-top">
            <div class="row m-2">
                <div class="col fw-bold">25 410 ₽</div>
                <div class="col text-end text-muted">Товаров: 4</div>
            </div>
        </div>
    </div>
    <div class="bg-white my-3 p-3">
        <div class="text-center">
            <h6 class="text-muted">Здесь появятся товары, отправленные службой доставки.</h6>
        </div>
    </div>
</div>
@endsection