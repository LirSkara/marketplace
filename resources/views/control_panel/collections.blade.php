@extends('control_panel.layout')
@section('main_content')
<div class="container">

    <h1 class="h3 mb-3">Подборки на главной</h1>

    <div class="row row-cols-2 g-2 my-2">
      @foreach($collections as $item)
      <div class="col">
          <div class="">
              <div class="divimg">
                  <img class="img-custom" style="object-fit: cover;height:110px;" src="/storage/collections/{{$item->image}}" alt="">
              </div>
              <div>Ссылка: {{$item->href}}</div>
              <div class="row text-center g-0">
                <div class="col">
                    <a class="btn btn-warning w-100 rounded-0" href="/cp_edit_collection/{{$item->id}}">Редактировать</a>
                </div>
                <div class="col">
                    <a class="btn btn-danger w-100 rounded-0" href="/cp_delete_collection/{{$item->id}}">Удалить</a>
                </div>
            </div>
          </div>
      </div>
      @endforeach
    </div>

    <a class="btn btn-secondary w-100" href="/cp_add_collection">Добавить подборку</a>

</div>
@endsection