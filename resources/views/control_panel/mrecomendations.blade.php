@extends('control_panel.layout')
@section('main_content')
<div class="container">

    <h1 class="h3 mb-3">Рекомендации на главной</h1>

    <div class="row row-cols-2 my-2">
      @foreach($mrecomendations as $item)
      <div class="col">
          <div class="">
              {{$item->product}}
              <div class="row text-center g-0">
                <div class="col">
                    <a class="btn btn-warning w-100 rounded-0" href="/cp_edit_mrecomendation/{{$item->id}}">Редактировать</a>
                </div>
                <div class="col">
                    <a class="btn btn-danger w-100 rounded-0" href="/cp_delete_mrecomendation/{{$item->id}}">Удалить</a>
                </div>
            </div>
          </div>
      </div>
      @endforeach
    </div>

    <a class="btn btn-secondary w-100" href="/cp_add_mrecomendation">Добавить рекомендацию</a>

</div>
@endsection