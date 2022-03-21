@extends('control_panel.layout')
@section('main_content')
<div class="container">

    <ul class="list-group">
        <li class="list-group-item bg-darksuccess text-white" aria-current="true">
            <div class="row">
                <div class="col-7 fs-5">Список категорий</div>
                <div class="col text-end">
                    <button class="btn btn-light py-1" style="font-size: 10pt;" data-bs-toggle="modal" data-bs-target="#addCategories"><i class="bi bi-plus-circle"></i> Добавить</button>
                </div>
            </div>

        </li>
        @foreach($items as $item)
        <li class="list-group-item p-0">
            <a class="px-3 bg-light text-dark text-decoration-none d-flex py-2" data-bs-toggle="collapse" href="#cat{{$item->id}}" aria-expanded="false" aria-controls="collapseExample">
                <i class="{{$item->icon}} text-muted me-2"></i> {{$item->name}} <i class="bi bi-chevron-down text-muted ms-auto my-auto"></i>
            </a>
            <div class="collapse" id="cat{{$item->id}}">
                @foreach($puncts->where('category', $item->id) as $punct)
                    <div class="px-3 text-dark text-decoration-none d-flex py-2">
                        {{$punct->name}} 
                        <button class="btn py-0 ms-auto" data-bs-toggle="modal" data-bs-target="#editpunct{{$punct->id}}"><i class="bi bi-pencil text-warning"></i></button>
                        <button class="btn py-0"  data-bs-toggle="modal" data-bs-target="#deletepunct{{$punct->id}}"><i class="bi bi-trash text-danger"></i></button>
                    </div>

                    <!-- Modal Edit punkt -->
                    <div class="modal fade" id="editpunct{{$punct->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header d-flex border-0">
                                    <h3 class="modal-title ms-auto" id="exampleModalLabel">Редактировать подкатегорию</h3>
                                    <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/edit_punct/{{$punct->id}}" method="POST">
                                    @csrf

                                        <div class="form-floating mt-2">
                                            <input type="text" name="name" value="{{$punct->name}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                            <label for="floatingInput">Название подкатегории</label>
                                        </div>

                                        <button class="btn btn-lg bg-darksuccess text-white mt-2 w-100">Редактировать</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal delete punkt -->
                    <div class="modal fade" id="deletepunct{{$punct->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="width: 400px;">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="d-flex flex-column">
                                        <h4>Подтверждение</h4>
                                        <div>Вы действительно хотите удалить эту категорию? Отменить это действие будет невозможно</div>
                                        <div class="d-flex gap-3 ms-auto mt-1">
                                            <a href="/delete_punct/{{$punct->id}}" class="text-dark py-2 px-1">Да</a>
                                            <button class="btn px-1" data-bs-dismiss="modal">Нет</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                <div class="row g-0 small">

                    <div class="col">
                        <a href="/category_del/{{$item->id}}" class="px-3 alert-danger text-dark text-decoration-none d-block py-2 text-center">
                            <i class="bi bi-trash me-1"></i> Удалить
                        </a>
                    </div>

                    <div class="col">
                        <a href="/category_edit/{{$item->id}}" class="px-3 alert-warning text-dark text-decoration-none d-block py-2 text-center">
                            <i class="bi bi-pencil-square me-1"></i> Редакт.
                        </a>
                    </div>

                    <div class="col">
                        <a href="/punkt_add/{{$item->id}}" class="px-3 alert-success text-dark text-decoration-none d-block py-2 text-center">
                            <i class="bi bi-plus-circle me-1"></i> Пункт
                        </a>
                    </div>

                </div>
            </div>
        </li>
        @endforeach
    </ul>

</div>

<!-- Modal Add Categories -->
<div class="modal fade" id="addCategories" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавление категории</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/add_categories" method="POST">
                    @csrf
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="text">
                        <label for="icon">Иконка</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="name" name="name" placeholder="text">
                        <label for="name">Название категории</label>
                    </div>
                    <button class="btn btn-darksuccess w-100 mt-2"><i class="bi bi-plus-circle"></i> Добавить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection