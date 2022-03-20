@extends('store.layout')
@section('main_content')
<div class="container pb-2">
    <div class="d-flex flex-column">
        <nav aria-label="breadcrumb custom-cr">
            <ol class="breadcrumb crumb-custom">
                <li class="breadcrumb-item"><a href="/store">{{$item->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Товары</li>
            </ol>
        </nav>
        <div class="d-flex">
            <h5 class="fw-bold me-3">{{$item->name}}</h5>
            <span class="my-auto text-muted small"></span>
        </div>
    </div>
    <div id="rows" class="row g-3 row-cols-2 mt-0 px-2">

        @foreach($products as $product)
            @if($product->store == $item->id)
                <div class="col mb-2 small">
                    <a href="/product" class="text-decoration-none text-dark">
                        <div class="text-center"><img class="img-width-one" src="/storage/product/cover/{{$product->image}}" alt="..." style="object-fit: cover;height:150px"></div>
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
                    @if($product->status == 0)
                    <div class="text-danger small">На модерации</div>
                    @endif
                    <div class="mt-1">
                        <a href="/cart" class="btn btn-warning text-white py-1">Ред.</a>
                        <button class="btn btn-danger py-1">Удалить</button>
                    </div>
                </div>
            @endif
        @endforeach
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