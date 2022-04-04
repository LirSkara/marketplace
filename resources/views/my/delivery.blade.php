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
    <div class="d-flex gap-2">
        @foreach($cart_order as $item)
            <div class="bg-light my-3 rounded-3 shadow-sm px-2" style="overflow: width: 300px;">
                <div class="row p-2">
                    <div class="col text-muted">Заказ №{{$item->id}} | <span class="text-success">@if($item->sposob == 1) Доставка @else Самовызов @endif</span></div>
                    <div class="col-2 dropdown pe-0 text-end">
                        <button class="btn py-0 px-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="p-2">
                    <div>{{$item->adress}}</div>
                    <div class="text-muted">Время: от 16:00, до 20:00 по МСК</div>
                </div>
                <ul class="d-flex list-unstyled py-3 px-3 scroll-none">
                    @foreach($products as $product_array)
                        @foreach($product_all->where('id', '=', trim(strstr($product_array, '-', true))) as $product)
                            <li class="me-2">
                                <div class="mb-2 small" style="width: 8rem;">
                                    <a href="/product" class="text-decoration-none text-dark">
                                        <div class="text-center"><img class="img-width-one" src="/storage/product/cover/{{$product->image}}" alt="..."></div>
                                        <div class="mt-2"><span class="fw-bold me-2">{{$product->price}} р</span></div>
                                        <div class="text-muted">{{$product->name}}</div>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
                <?php
                    $colvo = 0;
                    $itogo = 0;
                    $products = explode(",", $item->product);
                    foreach($products as $product) {
                        $colvo = $colvo+trim(strstr($product, '-'), '- ');
                        $my_product = $product_all->where('id', '=', trim(strstr($product, '-', true)))->first();
                        $itogo = $itogo + $my_product->price*trim(strstr($product, '-'), '- ');
                    }     
                ?>
                <div class="border-top">
                    <div class="row m-2">
                        <div class="col fw-bold">{{$itogo}} ₽</div>
                        <div class="col text-end text-muted">Товаров: {{$colvo}}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="bg-white my-3 p-3">
        <div class="text-center">
            <h6 class="text-muted">Здесь появятся товары, отправленные службой доставки.</h6>
        </div>
    </div>
</div>
@endsection