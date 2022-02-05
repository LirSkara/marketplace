@extends('control_panel.layout')
@section('main_content')
<div class="container">
  <nav aria-label="breadcrumb custom-cr">
    <ol class="breadcrumb crumb-custom">
        <li class="breadcrumb-item"><a href="/cp_categories">Категории</a></li>
        <li class="breadcrumb-item active" aria-current="page">Редактирование категории</li>
    </ol>
</nav>
  <form action="/category_edit/{{$item->id}}" method="POST">
    @csrf
    <div class="form-floating mb-2">
        <input type="text" class="form-control" value="{{$item->icon}}" id="icon" name="icon" placeholder="text">
        <label for="icon">Иконка</label>
    </div>
    <div class="form-floating mb-2">
        <input type="text" class="form-control" value="{{$item->name}}" id="name" name="name" placeholder="text">
        <label for="name">Название категории</label>
    </div>
    <button class="btn btn-darksuccess w-100 mt-2"><i class="bi bi-check2-square"></i> Сохранить</button>
</form>
@endsection