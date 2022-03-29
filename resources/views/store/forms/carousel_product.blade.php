@extends('store.layout')
@section('main_content')
<div class="container pb-2">
    <div class="d-flex flex-column">
        <nav aria-label="breadcrumb custom-cr">
            <ol class="breadcrumb crumb-custom">
                <li class="breadcrumb-item"><a href="/store">{{$store->name}}</a></li>
                <li class="breadcrumb-item"><a href="/store/products">Товары</a></li>
                <li class="breadcrumb-item active" aria-current="page">Карусель</li>
            </ol>
        </nav>
        <div class="d-flex">
            <h5 class="fw-bold me-3">Карусль товара Часы</h5>
            <span class="my-auto text-muted small"></span>
        </div>
    </div>
    <div class="w-100 px-2" style="position: absolute; bottom: 10px; left: 0px;">
        <button class="btn bg-darksuccess text-white w-100" data-bs-toggle="modal" data-bs-target="#addcarousel{{$product->id}}">Добавить карусель</button>
    </div>
    @if($carousel_product_count != 0)
        <div class="row row-cols-2">
            @foreach($carousel_product as $item)
                <div class="col d-flex flex-column">
                    <div class="text-center"><img class="img-width-one rounded-top" src="/storage/product/carousel/{{$item->product_id}}/{{$item->image}}" alt="..." style="object-fit: cover;height:150px"></div>
                    <div class="d-flex">
                        <button class="btn btn-warning w-50 border-left" data-bs-toggle="modal" data-bs-target="#editcarousel{{$item->id}}">Ред</button>
                        <button class="btn btn-danger w-50 border-right" data-bs-toggle="modal" data-bs-target="#deletecarousel{{$item->id}}">Удалить</button>
                    </div>
                </div>

                <!-- Modal Edit Carousel -->
                <div class="modal fade" id="editcarousel{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header d-flex border-0">
                                <h3 class="modal-title ms-auto" id="exampleModalLabel">Редактировать карусель</h3>
                                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/edit_carousel_product/{{$item->id}}" method="POST" enctype="multipart/form-data">
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

                <!-- Modal delete carousel -->
                <div class="modal fade" id="deletecarousel{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="d-flex flex-column">
                                    <h4>Подтверждение</h4>
                                    <div>Вы действительно хотите удалить этот товар? Отменить это действие будет невозможно</div>
                                    <div class="d-flex gap-3 ms-auto mt-1">
                                        <a href="/delete_carousel_product/{{$item->id}}" class="text-dark py-2">Да</a>
                                        <button class="btn" data-bs-dismiss="modal">Нет</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
    <div class="d-flex flex-column text-center" style="margin-top: 50%;">
        <i class="bi bi-film text-lightsuccess mb-1" style="font-size: 50px;"></i>
        <h4 class="fw-custom">У данного товара нет карусели </h4>
        <span class="fs-5 mb-1">Если хотите добавить нажмите на кнопку ниже</span>
        <i class="bi bi-arrow-down text-darksuccess fs-1"></i>
    </div>
    @endif
</div>

<!-- Modal Aff Carousel -->
<div class="modal fade" id="addcarousel{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex border-0">
                <h3 class="modal-title ms-auto" id="exampleModalLabel">Добавить карусель</h3>
                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/add_carousel_product/{{$product->id}}" method="POST" enctype="multipart/form-data">
                @csrf

                    <div class="mb-1">
                        @error('image'){{$message}}@enderror
                        <input class="form-control" name="image" type="file" id="image">
                    </div>

                    <button class="btn btn-lg bg-darksuccess text-white mt-2 w-100">Добавить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection