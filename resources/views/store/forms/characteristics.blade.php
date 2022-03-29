@extends('store.layout')
@section('main_content')
<div class="container pb-2">
    <div class="d-flex flex-column">
        <nav aria-label="breadcrumb custom-cr">
            <ol class="breadcrumb crumb-custom">
                <li class="breadcrumb-item"><a href="/store">{{$store->name}}</a></li>
                <li class="breadcrumb-item"><a href="/store/products">Товары</a></li>
                <li class="breadcrumb-item active" aria-current="page">Характеристики</li>
            </ol>
        </nav>
        <div class="d-flex">
            <h5 class="fw-bold me-3">Характеристики товара Часы</h5>
            <span class="my-auto text-muted small"></span>
        </div>
    </div>
    <div class="w-100 px-2" style="position: absolute; bottom: 10px; left: 0px;">
        <button class="btn bg-darksuccess text-white w-100" data-bs-toggle="modal" data-bs-target="#addcharacteristics{{$product->id}}">Добавить характеристику</button>
    </div>
    <div class="d-flex flex-column">
        @foreach($characteristics as $item)
            <div class="d-flex border-bottom py-2 px-2">
                <span class="fw-custom">{{$item->name}}:</span>
                <span class="ms-1">{{$item->description}}</span>
                <button class="btn ms-auto py-0" data-bs-toggle="modal" data-bs-target="#editcharacteristics{{$item->id}}"><i class="bi bi-pencil text-warning me-1"></i></button>
                <button class="btn py-0" data-bs-toggle="modal" data-bs-target="#deletecharacteristics{{$item->id}}"><i class="bi bi-trash text-danger me-1"></i></button>
            </div>

            <!-- Modal Edit Carousel -->
            <div class="modal fade" id="editcharacteristics{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex border-0">
                            <h3 class="modal-title ms-auto" id="exampleModalLabel">Редактировать карусель</h3>
                            <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/edit_characteristics/{{$item->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                                <div class="d-flex gap-2">
                                    <div class="form-floating mb-2">
                                        @error('name'){{$message}}@enderror
                                        <input type="text" class="form-control" value="{{$item->name}}" id="name" name="name" placeholder="text">
                                        <label for="name">Название</label>
                                    </div>                      
                                    <div class="form-floating mb-2">
                                        @error('description'){{$message}}@enderror
                                        <input type="text" class="form-control" value="{{$item->description}}" id="description" name="description" placeholder="text">
                                        <label for="description">Описание</label>
                                    </div>                  
                                </div>

                                <button class="btn btn-lg bg-darksuccess text-white mt-2 w-100">Редактировать</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal delete carousel -->
            <div class="modal fade" id="deletecharacteristics{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="d-flex flex-column">
                                <h4>Подтверждение</h4>
                                <div>Вы действительно хотите удалить этот товар? Отменить это действие будет невозможно</div>
                                <div class="d-flex gap-3 ms-auto mt-1">
                                    <a href="/delete_characteristics/{{$item->id}}" class="text-dark py-2">Да</a>
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

<!-- Modal Aff Carousel -->
<div class="modal fade" id="addcharacteristics{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex border-0">
                <h3 class="modal-title ms-auto" id="exampleModalLabel">Добавить характеристику</h3>
                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/add_characteristics/{{$product->id}}" method="POST">
                @csrf

                    <div class="d-flex gap-2">
                        <div class="form-floating mb-2">
                            @error('name'){{$message}}@enderror
                            <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="text">
                            <label for="name">Название</label>
                        </div>                      
                        <div class="form-floating mb-2">
                            @error('description'){{$message}}@enderror
                            <input type="text" class="form-control" value="{{old('description')}}" id="description" name="description" placeholder="text">
                            <label for="description">Описание</label>
                        </div>                  
                    </div>

                    <button class="btn btn-lg bg-darksuccess text-white mt-2 w-100">Добавить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection