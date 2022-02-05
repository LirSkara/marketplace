@extends('control_panel.layout')
@section('main_content')
<div class="container">

    <h1 class="h3 mb-3">Слайды на главной</h1>

    @foreach($slides as $slide)
    <div class="card mb-2">
        <img src="/storage/slides/{{$slide->image}}" style="object-fit: cover;height:200px;" class="d-block w-100" alt="...">
        <div>Ссылка: {{$slide->href}}</div>
        <div class="row text-center g-0">
            <div class="col">
                <a class="btn btn-warning w-100 rounded-0" href="/cp_edit_slide/{{$slide->id}}">Редактировать</a>
            </div>
            <div class="col">
                <a class="btn btn-danger w-100 rounded-0" href="/cp_delete_slide/{{$slide->id}}">Удалить</a>
            </div>
        </div>
    </div>
    @endforeach

    <a class="btn btn-secondary w-100" href="/cp_add_slide">Добавить слайд</a>

</div>
@endsection