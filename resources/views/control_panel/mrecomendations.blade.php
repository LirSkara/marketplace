@extends('control_panel.layout')
@section('main_content')
<div class="container">

    <h1 class="h3 mb-3">Рекомендации на главной</h1>

    <div class="row row-cols-2 my-2">
      @foreach($mrecomendations as $item)
        <div class="col mb-2 small">
            <a href="/product/1" class="text-decoration-none text-dark">
                <div class="text-center"><img class="img-width-one rounded-3" src="/storage/product/cover/{{$products->find($item->product)->image}}" alt="..."></div>
            </a>
        </div>
        <div class="col">
            <div class="">
                {{$products->find($item->product)->name}}
                <div class="">
                    <span class="fw-bold me-2">{{$products->find($item->product)->price}} ₽</span>
                    <span class="text-muted text-decoration-line-through">цена</span>
                </div>
                <div class="text-muted">{{$products->find($item->product)->article}}</div>
                <div class="row row-cols-2 text-center g-0">
                    <div class="col">
                        <a class="btn btn-warning w-100 rounded-0 rounded-start" href="/cp_edit_mrecomendation/{{$item->id}}">Редакт</a>
                    </div>
                    <div class="col">   
                        <a class="btn btn-danger w-100 rounded-0 rounded-end" href="/cp_delete_mrecomendation/{{$item->id}}">Удалить</a>
                    </div>
                </div>
            </div>
        </div>
      @endforeach
    </div>

    <a class="btn btn-secondary w-100" href="/cp_add_mrecomendation">Добавить рекомендацию</a>

</div>
@endsection