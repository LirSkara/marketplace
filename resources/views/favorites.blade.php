@extends('layouts.layout')
@section('title')Избранное@endsection
@section('main_content')
<div class="container">
    <nav aria-label="breadcrumb custom-cr">
        <ol class="breadcrumb crumb-custom">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="/cabinet">Кабинет</a></li>
            <li class="breadcrumb-item active" aria-current="page">Избранное</li>
        </ol>
    </nav>
    <h1 class="fs-2">Избранное</h1>
    @if(Auth::check())
        @if($favourites->where('user',$user->id)->count() == 0)
        <div class="bg-white my-3 p-3">
            <div class="text-center">
                <h6 class="text-muted">Здесь появятся товары, отмеченные как понравившиеся значком <i class="bi bi-heart-fill text-danger"></i></h6>
                <a class="btn btn-darksuccess btn-lg mt-2" href="/"><i class="bi bi-house"></i> Вернуться к покупкам</a>
            </div>
        </div>
        @else
        <div id="rows" class="row g-3 row-cols-2 row-cols-lg-6 mt-0 px-2">
            @foreach($favourites as $favourite)
                <div class="col mb-2 small">
                    <a href="/product/{{$products->find($favourite->product)->id}}" class="text-decoration-none text-dark">
                        <div id="carouselExampleIndicators{{$products->find($favourite->product)->id}}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="/storage/product/cover/{{$products->find($favourite->product)->image}}" class="d-block carusel-image rounded-3" alt="...">
                                </div>
                                @foreach($carousel_product->where('product_id', $products->find($favourite->product)->id) as $carousel)
                                    <div class="carousel-item">
                                        <img src="/storage/product/carousel/{{$carousel->product_id}}/{{$carousel->image}}" class="d-block carusel-image rounded-3" alt="...">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators{{$products->find($favourite->product)->id}}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon fs-1" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators{{$products->find($favourite->product)->id}}" data-bs-slide="next">
                                <span class="carousel-control-next-icon fs-1" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="mt-2"><span class="fw-bold me-2">{{$products->find($favourite->product)->price}} ₽</span><span class="text-muted text-decoration-line-through">25 990 ₽</span></div>
                        <div class="text-muted">Philips / Пылесос сухая / FC9733/01</div>
                        <?php
                            $count = $reviews->where('product',$products->find($favourite->product)->id)->count();
                            if($count == 0){$count = 1;}
                            $product_reviews = $reviews->where('product',$products->find($favourite->product)->id)->get();
                            $all = 0;
                            foreach($product_reviews as $review_product){
                                $all = $review_product->rating + $all;
                            }
                            $all = $all/$count;
                        ?>
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
                    </a>
                    <div class="mt-1">
                        @if(Auth::check())
                            <input type="number" id="i{{$products->where('id', $favourite->product)->first()->id}}" value="1" min="0" class="form-control pt-1 pb-2 w-50 d-none">
                            <button class="btn btn-darksuccess text-white py-1 me-2" id="{{$products->where('id', $favourite->product)->first()->id}}" onclick="cart_swap(this.id)">В корзину</button>
                            <button class="btn btn-primary py-1 d-none" id="c{{$products->where('id', $favourite->product)->first()->id}}" onclick="give_cart(this.id)"><i class="bi bi-cart-check fs-5"></i></button>
                        @else
                            <a href="/order_one/{{$products->where('id', $favourite->product)->first()->id}}" class="btn btn-darksuccess text-white py-1 me-2">Купить</a>
                        @endif
                        @if(Auth::check())
                            @if($favourites->where('product', $products->where('id', $favourite->product)->first()->id)->count() > 0)
                                <button class="btn btn-light py-1" id="f{{$products->where('id', $favourite->product)->first()->id}}" onclick="give(this.id)"><i class="bi bi-heart-fill text-danger fs-5"></i></button>
                            @else
                                <button class="btn btn-light py-1" id="f{{$products->where('id', $favourite->product)->first()->id}}" onclick="give(this.id)"><i class="bi bi-heart text-danger fs-5"></i></button>
                            @endif
                        @else
                            <button class="btn btn-light py-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-heart text-danger fs-5"></i></button>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
        </div>
    @else
    <div class="bg-white my-3 p-3">
        <div class="text-center">
            <h6 class="text-muted">Здесь появятся товары, отмеченные как понравившиеся значком <i class="bi bi-heart-fill text-danger"></i></h6>
            <a class="btn btn-darksuccess btn-lg mt-2" href="/login"><i class="bi bi-person"></i> Войти в личный кабинет</a>
        </div>
    </div>
    @endif
</div>
<script src="/js/ajax.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    heart.classList.remove('text-muted')
    heart.classList.add('text-danger')
</script>
@endsection