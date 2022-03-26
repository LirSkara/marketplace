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
    <div class="bg-white my-3">
        <div class="my-2">
            @if(Auth()->check())
                @if($cart->where('user_id',$user->id)->count() > 0)
                    <div class="row row-cols-1 row-cols-lg-3">
                        @foreach($cart as $item)
                            <div class="col">
                                <div class="card mb-2 shadow">
                                    <div class="row g-0">
                                        <div class="col-5">
                                            <img src="/storage/product/cover/{{$products->find($item->product_id)->image}}" style="object-fit: cover;height:145px;width:100%" alt="">
                                            <input type="number" class="form-control" value="{{$item->colvo}}">
                                        </div>
                                        <div class="col">
                                            <div class="card-body">
                                                <div class="fs-6">{{$products->find($item->product_id)->price}} ₽</div>
                                                <div class="fs-6">{{$products->find($item->product_id)->name}}</div>
                                                <div class="fs-6 text-muted">Артикул: {{$products->find($item->product_id)->article}}</div>
                                                <a class="mt-2 btn btn-danger text-decoration-none" href="/delete_cart/{{$item->id}}"><i class="bi bi-trash"></i> Удалить</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <img class="cart-image mb-3" src="https://www.joom.com/dist/3dea8e41e39b9de093eb7f84da259fb9.svg" alt="">
                    <h2 class="text-muted mb-3">Тут пока пусто</h2>
                    <a class="btn btn-darksuccess btn-lg mt-2" href="/"><i class="bi bi-house"></i> Вернуться к покупкам</a>
                @endif
            @else
                <h2 class="text-muted mb-3">Умная корзина доступна после авторизации!</h2>
                <a class="btn btn-darksuccess btn-lg mt-2" href="/login"><i class="bi bi-person"></i> Войти в кабинет</a>
            @endif
        </div>
    </div>
</div>
<script>
    cart.classList.remove('text-muted')
    cart.classList.add('text-info')
</script>
@endsection