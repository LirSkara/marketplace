@extends('control_panel.layout')
@section('main_content')
<div class="container">

    <h1 class="h3 mb-3">Продукты на проверке</h1>

    <div class="row row-cols-2 my-2">
      @foreach($products as $item)
        <div class="col mb-2 small">
            <a href="/product/1" class="text-decoration-none text-dark">
                <div class="text-center"><img class="img-width-one" src="/storage/product/cover/User_ID_1_633189.jpg" alt="..."></div>
            </a>
        </div>
        <div class="col">
            <div class="">
                {{$item->name}}
                <div class="">
                    <span class="fw-bold me-2">12321321 ₽</span>
                </div>
                <div class="text-muted">1213123</div>
                <div class="row text-center g-0 mt-2">
                    <div class="col">
                        <a class="btn btn-success w-100 rounded-0" href="/cp_edit_mrecomendation/{{$item->id}}"><i class="bi bi-check-lg"></i> Одобрить</a>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-danger w-100 rounded-0" href="/cp_delete_mrecomendation/{{$item->id}}"><i class="bi bi-x-octagon-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>
      @endforeach
    </div>

</div>
@endsection