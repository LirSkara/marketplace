@extends('control_panel.layout')
@section('main_content')
<div class="container">

    <h1 class="h3 mb-3">Акции на главной</h1>

    <div class="row row-cols-1 my-2">
      @foreach($mactions as $item)
      <div class="col">
          <div class="">
              <div class="divimg">
                  <img class="img-custom" style="object-fit: cover;height:130px;" src="/storage/mactions/{{$item->image}}" alt="">
              </div>
              <div>Ссылка: {{$item->href}}</div>
              <div class="row text-center g-0">
                <div class="col">
                    <a class="btn btn-warning w-100 rounded-0" href="/cp_edit_maction/{{$item->id}}">Редактировать</a>
                </div>
                <div class="col">
                    <a class="btn btn-danger w-100 rounded-0" href="/cp_delete_maction/{{$item->id}}">Удалить</a>
                </div>
            </div>
          </div>
      </div>
      @endforeach
    </div>

    <a class="btn btn-secondary w-100" href="/cp_add_maction">Добавить акцию</a>

</div>
@endsection