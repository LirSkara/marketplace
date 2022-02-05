@extends('layouts.layout')
@section('title')Корзина покупок@endsection
@section('main_content')
<div class="container">
    <nav aria-label="breadcrumb custom-cr">
        <ol class="breadcrumb crumb-custom">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Корзина покупок</li>
        </ol>
    </nav>
    <h1 class="fs-2">Корзина покупок</h1>
    <div class="bg-white my-3 p-3">
        <div class="text-center my-5">
            <img class="cart-image mb-3" src="https://www.joom.com/dist/3dea8e41e39b9de093eb7f84da259fb9.svg" alt="">
            <h2 class="text-muted mb-3">Тут пока пусто</h2>
            <a class="btn btn-darksuccess btn-lg mt-2" href="/"><i class="bi bi-house"></i> Вернуться к покупкам</a>
        </div>
    </div>
</div>
<script>
    cart.classList.remove('text-muted')
    cart.classList.add('text-info')
</script>
@endsection