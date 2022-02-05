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
    <h1 class="fs-2">Моя скидка</h1>
    <div class="bg-white my-3 p-3">
        <div class="row">
            <div class="col fs-1">
                <span class="p-3 bg-light rounded-circle border">3%</span>
            </div>
            <div class="col-8 small">
                Скидка зависит от суммы выкупа за весь период.
            </div>
        </div>
    </div>
    <ul class="list-group">

        <li class="list-group-item">
            <div class="row">
                <div class="col">от 0 руб.</div>
                <div class="col text-end"> 3%</div>
            </div>
        </li>

        <li class="list-group-item bg-darksuccess text-white">
            <div class="row">
                <div class="col">Сейчас: 5 500 руб.</div>
                <div class="col text-end"> 3%</div>
            </div>
        </li>

        <li class="list-group-item">
            <div class="row">
                <div class="col">от 100 000 руб.</div>
                <div class="col text-end"> 5%</div>
            </div>
        </li>

        <li class="list-group-item">
            <div class="row">
                <div class="col">от 250 000 руб.</div>
                <div class="col text-end"> 7%</div>
            </div>
        </li>

        <li class="list-group-item">
            <div class="row">
                <div class="col">от 500 000 руб.</div>
                <div class="col text-end"> 10%</div>
            </div>
        </li>

    </ul>

    <div class="text-muted small mt-2">Скидка применяется автоматически в вашей корзине.</div>
</div>
@endsection