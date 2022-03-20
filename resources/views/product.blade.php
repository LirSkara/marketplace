@extends('layouts.layout')
@section('title')Страница товара@endsection
@section('main_content')
<div class="container">
    <nav aria-label="breadcrumb custom-cr">
        <ol class="breadcrumb crumb-custom">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="/brand/{{$product->store}}">{{$store->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
        </ol>
    </nav>
    <div class="bg-white my-3 p-3">
        <div class="">
            <div class="row p-0">
                <div class="col-12 col-lg-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/storage/product/cover/{{$product->image}}" class="d-block carusel-image" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon fs-1" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon fs-1" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                    <h1>{{$product->name}}</h1>
                    <div class="row mt-1">
                        <div class="col-12 col-lg-6">
                            <span class="fs-2">{{$product->price}} ₽</span>
                        </div>
                        <div class="col-12 col-lg-6 mt-2 mt-lg-0">
                            @if(Auth::check())
                            <button class="btn btn-lg btn-darksuccess btn-custom" id="c{{$product->id}}" onclick="give_cart(this.id)"><i class="bi bi-bag-plus"></i> Добавить в корзину</button>
                        @else
                            <a href="/order_one/{{$product->id}}" class="btn btn-lg btn-darksuccess btn-custom" id="c{{$product->id}}" onclick="give_cart(this.id)"><i class="bi bi-bag-plus"></i> Купить сейчас</a>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="border-top mt-3 pt-2">
                    <div class="fw-bold">Описание</div>
                    <div class="text-muted">{{$product->description}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-light rounded border p-3">
        <div class="row mb-3">
            <div class="col">
                <div class="fs-5">Отзывы: {{$reviews->count()}}</div>
            </div>
            <div class="col text-end">

                <?php $all = 0;?>
                @foreach($reviews as $review)
                    <?php $all = $review->rating+$all ?>
                @endforeach
                @if($all != 0)
                    <?php $all = $all/$reviews->count(); ?>
                @endif

                @if($all >= 5)
                    <i class="bi bi-star-fill text-darksuccess me-1"></i>
                    <i class="bi bi-star-fill text-darksuccess me-1"></i>
                    <i class="bi bi-star-fill text-darksuccess me-1"></i>
                    <i class="bi bi-star-fill text-darksuccess me-1"></i>
                    <i class="bi bi-star-fill text-darksuccess"></i>
                @elseif($all >= 4)
                    <i class="bi bi-star-fill text-darksuccess me-1"></i>
                    <i class="bi bi-star-fill text-darksuccess me-1"></i>
                    <i class="bi bi-star-fill text-darksuccess me-1"></i>
                    <i class="bi bi-star-fill text-darksuccess me-1"></i>
                    <i class="bi bi-star text-darksuccess"></i>
                @elseif($all >= 3)
                    <i class="bi bi-star-fill text-darksuccess me-1"></i>
                    <i class="bi bi-star-fill text-darksuccess me-1"></i>
                    <i class="bi bi-star-fill text-darksuccess me-1"></i>
                    <i class="bi bi-star text-darksuccess me-1"></i>
                    <i class="bi bi-star text-darksuccess"></i>
                @elseif($all >= 2)
                    <i class="bi bi-star-fill text-darksuccess me-1"></i>
                    <i class="bi bi-star-fill text-darksuccess me-1"></i>
                    <i class="bi bi-star text-darksuccess me-1"></i>
                    <i class="bi bi-star text-darksuccess me-1"></i>
                    <i class="bi bi-star text-darksuccess"></i>
                @elseif($all >= 1)
                    <i class="bi bi-star-fill text-darksuccess me-1"></i>
                    <i class="bi bi-star text-darksuccess me-1"></i>
                    <i class="bi bi-star text-darksuccess me-1"></i>
                    <i class="bi bi-star text-darksuccess me-1"></i>
                    <i class="bi bi-star text-darksuccess"></i>
                @elseif($all >= 0)
                    <i class="bi bi-star text-darksuccess me-1"></i>
                    <i class="bi bi-star text-darksuccess me-1"></i>
                    <i class="bi bi-star text-darksuccess me-1"></i>
                    <i class="bi bi-star text-darksuccess me-1"></i>
                    <i class="bi bi-star text-darksuccess"></i>
                @endif
            </div>
        </div>
        @foreach($reviews as $review)
        <div class="alert alert-light shadow-sm pb-0" role="alert">
            <div class="row">
                <div class="col-2">
                    <img src="/storage/avatars/{{$users->find($review->user)->avatar}}" alt="mdo" class="rounded-circle" width="42" height="42">
                </div>
                <div class="col">
                    <div style="position:relative;top: -6px;">
                        <span class="alert-heading fs-5 ms-2">{{$users->find($review->user)->lastname}} {{$users->find($review->user)->firstname}}</span>
                        <div class="ms-2" style="font-size: 9pt;">
                            @if($review->rating >= 5)
                                <i class="bi bi-star-fill text-darksuccess me-1"></i>
                                <i class="bi bi-star-fill text-darksuccess me-1"></i>
                                <i class="bi bi-star-fill text-darksuccess me-1"></i>
                                <i class="bi bi-star-fill text-darksuccess me-1"></i>
                                <i class="bi bi-star-fill text-darksuccess"></i>
                            @elseif($review->rating >= 4)
                                <i class="bi bi-star-fill text-darksuccess me-1"></i>
                                <i class="bi bi-star-fill text-darksuccess me-1"></i>
                                <i class="bi bi-star-fill text-darksuccess me-1"></i>
                                <i class="bi bi-star-fill text-darksuccess me-1"></i>
                                <i class="bi bi-star text-darksuccess"></i>
                            @elseif($review->rating >= 3)
                                <i class="bi bi-star-fill text-darksuccess me-1"></i>
                                <i class="bi bi-star-fill text-darksuccess me-1"></i>
                                <i class="bi bi-star-fill text-darksuccess me-1"></i>
                                <i class="bi bi-star text-darksuccess me-1"></i>
                                <i class="bi bi-star text-darksuccess"></i>
                            @elseif($review->rating >= 2)
                                <i class="bi bi-star-fill text-darksuccess me-1"></i>
                                <i class="bi bi-star-fill text-darksuccess me-1"></i>
                                <i class="bi bi-star text-darksuccess me-1"></i>
                                <i class="bi bi-star text-darksuccess me-1"></i>
                                <i class="bi bi-star text-darksuccess"></i>
                            @elseif($review->rating >= 1)
                                <i class="bi bi-star-fill text-darksuccess me-1"></i>
                                <i class="bi bi-star text-darksuccess me-1"></i>
                                <i class="bi bi-star text-darksuccess me-1"></i>
                                <i class="bi bi-star text-darksuccess me-1"></i>
                                <i class="bi bi-star text-darksuccess"></i>
                            @elseif($review->rating >= 0)
                                <i class="bi bi-star text-darksuccess me-1"></i>
                                <i class="bi bi-star text-darksuccess me-1"></i>
                                <i class="bi bi-star text-darksuccess me-1"></i>
                                <i class="bi bi-star text-darksuccess me-1"></i>
                                <i class="bi bi-star text-darksuccess"></i>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            <p class="small">{{$review->text}}</p>
            <p style="font-size: 8pt">{{$review->created_at}}</p>
        </div>
        @endforeach

    </div>

    <div class="pb-4 mt-3">
        <div class="bg-light rounded border p-3">
            <form action="/review_add/{{$product->id}}" method="POST" class="">
                @csrf
                <div class="mb-2 d-flex justify-content-center">
                    <div class="stars">
                        <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                        <label class="star star-1" for="star-1"></label>
                    </div>
                </div>
                <textarea type="text" name="text" class="form-control" placeholder="Введите ваш отзыв"></textarea>
                <button class="btn btn-darksuccess w-100 mt-2">Оставить отзыв</button>
            </form>
        </div>
    </div>
</div>
@endsection