@extends('control_panel.layout')
@section('main_content')
<div class="container">
  <nav aria-label="breadcrumb custom-cr">
    <ol class="breadcrumb crumb-custom">
        <li class="breadcrumb-item"><a href="/cp_categories">Категории</a></li>
        <li class="breadcrumb-item"><a href="/cp_categories">{{$item->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Добавление пункта</li>
    </ol>
</nav>
  <form action="/punkt_add/{{$item->id}}" method="POST">
    @csrf
    <div class="form-floating mb-2">
        <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="text">
        <label for="name">Название пункта</label>
    </div>
    <button class="btn btn-darksuccess w-100 mt-2"><i class="bi bi-plus-circle"></i> Добавить</button>
</form>
@endsection