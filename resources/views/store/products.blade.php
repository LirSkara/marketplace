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

        @foreach($products->where('store', $item->id) as $product)
            <div class="col mb-2 small d-flex flex-column">
                <div id="carouselExampleIndicators{{$product->id}}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/storage/product/cover/{{$product->image}}" class="d-block carusel-image rounded-3" alt="...">
                        </div>
                        @foreach($carousel_product->where('product_id', $product->id) as $item)
                            <div class="carousel-item">
                                <img src="/storage/product/carousel/{{$item->product_id}}/{{$item->image}}" class="d-block carusel-image rounded-3" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators{{$product->id}}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon fs-1" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators{{$product->id}}" data-bs-slide="next">
                        <span class="carousel-control-next-icon fs-1" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <a href="/product" class="text-decoration-none text-dark mt-2">
                    <div><span class="fw-bold me-2">{{$product->price}} ₽</span></div>
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
                    @if($product->status == 0)
                    <div class="text-danger small">На модерации</div>
                    @endif
                </a>
                <div class="mt-1">
                    <button class="btn bg-darksuccess text-white w-100 dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        Детали 
                    </button>
                    <ul class="dropdown-menu small py-0" aria-labelledby="dropdownUser1">
                        <li><button class="dropdown-item border-bottom py-2"  data-bs-toggle="modal" data-bs-target="#editimg{{$item->id}}"><i class="bi bi-camera text-primary me-1"></i></i> Редактировать фото</button></li>
                        <li><a href="/characteristics/{{$product->id}}" class="dropdown-item border-bottom py-2"><i class="bi bi-camera text-primary me-1"></i></i> Характеристики</a></li>
                        <li><a href="/carousel_product/{{$product->id}}" class="dropdown-item border-bottom py-2"><i class="bi bi-film text-darksuccess me-1"></i> Карусель</a></li>
                        <li><button class="dropdown-item border-bottom py-2" data-bs-toggle="modal" data-bs-target="#edittovar{{$item->id}}"><i class="bi bi-pencil text-warning me-1"></i> Редактировать</button></li>
                        <li><button class="dropdown-item py-2 border-bottom" data-bs-toggle="modal" data-bs-target="#deletetovar{{$item->id}}"><i class="bi bi-trash text-danger me-1"></i> Удалить</button></li>
                    </ul>
                </div>
            </div>

            <!-- Modal Edit Img -->
            <div class="modal fade" id="editimg{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex border-0">
                            <h3 class="modal-title ms-auto" id="exampleModalLabel">Редактировать фото товара</h3>
                            <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/edit_product_img/{{$product->id}}" method="POST" enctype="multipart/form-data">
                            @csrf

                                <div class="mb-1">
                                    @error('image'){{$message}}@enderror
                                    <input class="form-control" name="image" type="file" id="image">
                                </div>

                                <button class="btn btn-lg bg-darksuccess text-white mt-2 w-100">Редактировать</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Tovar -->
            <div class="modal fade" id="edittovar{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex border-0">
                            <h3 class="modal-title ms-auto" id="exampleModalLabel">Редактировать товар</h3>
                            <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/edit_product/{{$product->id}}" method="POST">
                            @csrf

                                <div class="form-floating">
                                    @error('article'){{$message}}@enderror
                                    <input type="text" name="article" value="{{$product->article}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Артикл</label>
                                </div>

                                <div class="form-floating mt-2">
                                    @error('name'){{$message}}@enderror
                                    <input type="text" name="name" value="{{$product->name}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Наименование товара</label>
                                </div>

                                
                                <div class="form-floating mt-2">
                                    @error('description'){{$message}}@enderror
                                    <input type="text" name="description" value="{{$product->description}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Описание</label>
                                </div>

                                <div class="form-floating mt-2">
                                    @error('price'){{$message}}@enderror
                                    <input type="text" name="price" value="{{$product->price}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Цена</label>
                                </div>

                                <div class="form-floating mt-2">
                                    @error('ostatok'){{$message}}@enderror
                                    <input type="text" name="ostatok" value="{{$product->ostatok}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Остаток</label>
                                </div>

                                <select name="category" class="form-select mt-2" aria-label="Default select example">
                                    <option disabled="">Укажите категорию</option>
                                    @foreach($categories as $category)
                                        <option disabled="">-------- {{$category->name}} --------</option>
                                        @foreach($puncts as $punct)
                                            @if($punct->category == $category->id)
                                                <option @if($punct->id == $product->category) selected @endif value="{{$punct->id}}">{{$category->name}} -> {{$punct->name}}</option>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </select>

                                <button class="btn btn-lg bg-darksuccess text-white mt-2 w-100">Редактировать</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal delete -->
            <div class="modal fade" id="deletetovar{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="d-flex flex-column">
                                <h4>Подтверждение</h4>
                                <div>Вы действительно хотите удалить этот товар? Отменить это действие будет невозможно</div>
                                <div class="d-flex gap-3 ms-auto mt-1">
                                    <a href="/delete_product/{{$product->id}}" class="text-dark py-2">Да</a>
                                    <button class="btn" data-bs-dismiss="modal">Нет</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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