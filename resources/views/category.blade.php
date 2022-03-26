@extends('layouts.layout')
@section('main_content')
<div class="container pb-2">
    <div class="d-flex flex-column">
        <nav aria-label="breadcrumb custom-cr">
            <ol class="breadcrumb crumb-custom">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$c_name}}</li>
                <li class="breadcrumb-item active" aria-current="page">{{$item->name}}</li>
            </ol>
        </nav>
        <div class="d-flex">
            <h5 class="fw-bold me-3">{{$item->name}}</h5>
            <span class="my-auto text-muted small">0 товаров</span>
        </div>
        <ul class="d-flex list-unstyled mt-2 mb-1 py-1 scroll-none">
            <li><a href="" class="text-dark text-decoration-none border border-1 rounded-3 py-1 px-2 me-2 ms-2 d-flex">
                    <span>Бейсболки</span>
                </a>
            </li>
        </ul>
        <div class="d-flex row">
            <div class="col-3">
                <button onclick="two(this.id)" id="two" class="btn btn-none px-0"><i id="itemtwo" class="bi bi-microsoft fs-5 text-darksuccess"></i></button>
                <button onclick="one(this.id)" id="one" class="btn btn-none px-0"><i id="itemone" class="bi bi-view-list fs-5 text-muted"></i></button>
            </div>
            <div class="col my-auto text-center">
                <button onclick="sort(this.id)" id="sort" class="btn btn-none" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>По популярности</span>
                    <i id="down" class="bi bi-caret-down-fill down-custom"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><a class="dropdown-item" href="#">Сначала недорогие</a></li>
                    <li><a class="dropdown-item" href="#">Сначала дорогие</a></li>
                </ul>
            </div>
            <div class="col-3 text-end">
                <button class="btn px-0 ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModalfilter"><i class="bi bi-sliders fs-5 text-darksuccess"></i></button>
            </div>
        </div>
    </div>
    <div id="rows" class="row g-3 row-cols-2 mt-0 px-2">
        @foreach($products as $product)
            @if($product->category == $item->id)
                @if ($product->status == 1)
                    
                
                <div class="col mb-2 small">
                    <a href="/product/{{$product->id}}" class="text-decoration-none text-dark">
                        <div class="text-center"><img class="img-width-one rounded-3" src="/storage/product/cover/{{$product->image}}" alt="..." style="object-fit: cover;height:150px"></div>
                        <div class="mt-2"><span class="fw-bold me-2">{{$product->price}} ₽</span></div>
                        <div class="text-muted">{{$product->name}}</div>
                        <?php
                            $count = $reviews->where('product',$product->id)->count();
                            if($count == 0){$count = 1;}
                            $product_reviews = $reviews->where('product',$product->id)->get();
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
                            <input type="number" id="i{{$product->id}}" value="1" class="form-control pt-1 pb-2 w-50 d-none">
                            <button class="btn btn-darksuccess text-white py-1 me-2" id="{{$product->id}}" onclick="cart_swap(this.id)">В корзину</button>
                            <button class="btn btn-primary py-1 d-none" id="c{{$product->id}}" onclick="give_cart(this.id)"><i class="bi bi-cart-check fs-5"></i></button>
                        @else
                            <a href="/order_one/{{$product->id}}" class="btn btn-darksuccess text-white py-1 me-2">Купить</a>
                        @endif
                        @if(Auth::check())
                            @if($favourites->where('product',$product->id)->count() > 0)
                                <button class="btn btn-light py-1" id="f{{$product->id}}" onclick="give(this.id)"><i class="bi bi-heart-fill text-danger fs-5"></i></button>
                            @else
                                <button class="btn btn-light py-1" id="f{{$product->id}}" onclick="give(this.id)"><i class="bi bi-heart text-danger fs-5"></i></button>
                            @endif
                        @else
                            <button class="btn btn-light py-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-heart text-danger fs-5"></i></button>
                        @endif
                    </div>
                </div>
                @endif
            @endif
        @endforeach
    </div>
</div>

<!-- Modal Add Favourite -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content pb-2 pt-4">
            <h5 class="text-center mx-3" id="exampleModalLabel">Вы не авторизованы, для добавления товара в избранное.</h5>
            <div class="m-3 text-center">
                <a href="/login" class="btn btn-darksuccess">Войти в кабинет</a>
            </div>
        </div>
    </div>
  </div>

<!-- Начало модального окна фильтер -->
<div class="modal fade" id="exampleModalfilter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 3000;">
    <div class="modal-dialog modal-fullscreen-sm-down">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-body pt-0 px-0">
                <div class="container px-1">
                    <div class="d-flex flex-column">
                        <div class="d-flex">
                            <h5 class="fw-bold ms-2 me-auto my-auto">Фильтры</h5>
                            <button class="btn btn-none px-0 pb-0" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x fs-1 text-muted"></i></button>
                        </div>
                        <div class="d-flex flex-column px-2 mt-5">
                            <div class="mb-4 fw-custom">Цена</div>
                            <div class="d-flex">
                                <div class="d-flex flex-column">
                                    <label class="text-muted">От</label>
                                    <input type="text" class="w-100 border border-1 border-right-0 rounded-start py-1 px-2">
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="text-muted">До</label>
                                    <input type="text" class="w-100 border border-1 rounded-end py-1 px-2">
                                </div>
                            </div>
                        </div>
                        <ul class="list-group mt-2">
                            <li class="list-group-item border-0 py-3">
                                <a href="" class="text-dark text-decoration-none py-2 d-flex">
                                    <span class="fw-custom">Скидка</span>
                                    <i class="bi bi-chevron-right text-muted ms-auto my-auto"></i>
                                </a>
                            </li>
                            <li class="list-group-item border-0 py-3">
                                <a href="" class="text-dark text-decoration-none py-2 d-flex">
                                    <span class="fw-custom">Цвет</span>
                                    <i class="bi bi-chevron-right text-muted ms-auto my-auto"></i>
                                </a>
                            </li>
                            <li class="list-group-item border-0 py-3">
                                <a href="" class="text-dark text-decoration-none py-2 d-flex">
                                    <span class="fw-custom">Пол</span>
                                    <i class="bi bi-chevron-right text-muted ms-auto my-auto"></i>
                                </a>
                            </li>
                            <li class="list-group-item border-0 py-3">
                                <a href="" class="text-dark text-decoration-none py-2 d-flex">
                                    <span class="fw-custom">Размер</span>
                                    <i class="bi bi-chevron-right text-muted ms-auto my-auto"></i>
                                </a>
                            </li>
                            <li class="list-group-item border-0 py-3">
                                <a href="" class="text-dark text-decoration-none py-2 d-flex">
                                    <span class="fw-custom">Сезон</span>
                                    <i class="bi bi-chevron-right text-muted ms-auto my-auto"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Конец модального окна фильтер -->
@endsection