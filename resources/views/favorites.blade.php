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
        <div id="rows" class="row g-3 row-cols-2 mt-0 px-2">
            @foreach($favourites as $favourite)
                <div class="col mb-2 small">
                    <a href="/product/{{$products->find($favourite->product)->id}}" class="text-decoration-none text-dark">
                        <div class="text-center"><img class="img-width-one" src="/storage/product/cover/{{$products->find($favourite->product)->image}}" alt="..." style="object-fit: cover;height:150px"></div>
                        <div class="mt-2"><span class="fw-bold me-2">{{$products->find($favourite->product)->price}} ₽</span><span class="text-muted text-decoration-line-through">25 990 ₽</span></div>
                        <div class="text-muted">Philips / Пылесос сухая / FC9733/01</div>
                        <?php
                            $count = $reviews->where('product',$products->find($favourite->product)->id)->count();
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
                            <button class="btn btn-darksuccess text-white py-1 me-2" id="add_to_cart">В корзину</button>
                        @if(Auth::check())
                            @if($favourites->where('product',$products->find($favourite->product)->id)->count() > 0)
                                <button class="btn btn-light py-1" id="{{$products->find($favourite->product)->id}}" onclick="give(this.id)"><i class="bi bi-heart-fill text-danger fs-5"></i></button>
                            @else
                                <button class="btn btn-light py-1" id="{{$products->find($favourite->product)->id}}" onclick="give(this.id)"><i class="bi bi-heart text-danger fs-5"></i></button>
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