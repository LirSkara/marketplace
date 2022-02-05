@extends('layouts.layout')
@section('title')Избранное@endsection
@section('main_content')
<div class="container">
    <nav aria-label="breadcrumb custom-cr">
        <ol class="breadcrumb crumb-custom">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="/cabinet">Кабинет</a></li>
            <li class="breadcrumb-item active" aria-current="page">Скидка</li>
        </ol>
    </nav>
    <h1 class="fs-2">Мои купоны</h1>
    <div class="bg-white my-3">

        <div class="bg-purple rounded-3 p-3 text-white mb-2">
            <div class="row">
                <div class="col fs-1 fw-bold">
                    500 ₽
                </div>
                <div class="col-7 small">
                    Можно применить в корзине или передарить.
                </div>
            </div>
        </div>

        <div class="bg-success rounded-3 p-3 text-white">
            <div class="row">
                <div class="col fs-1 fw-bold">
                    1 000 ₽
                </div>
                <div class="col-7 small">
                    Можно применить только в корзине.
                </div>
            </div>
        </div>
    </div>


    <div class="text-muted small mt-2">Персональные купоны нельзя передарить.</div>
</div>
@endsection