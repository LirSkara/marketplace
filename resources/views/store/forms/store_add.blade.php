@extends('store.layout')
@section('main_content')
<div class="container">
  <nav aria-label="breadcrumb custom-cr">
    <ol class="breadcrumb crumb-custom">
        <li class="breadcrumb-item"><a href="/store">Магазин</a></li>
        <li class="breadcrumb-item active" aria-current="page">Добавление магазина</li>
    </ol>
</nav>
  <form action="/punkt_add/{{$user->id}}" method="POST">
    @csrf
    <div class="mb-2 fs-3">Основная информация</div>
    <div class="mb-3">
        <input class="form-control" name="avatar" type="file" id="avatar">
    </div>
    <div class="form-floating mb-2">
        <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="text">
        <label for="name">Название магазина</label>
    </div>
    <div class="form-floating mb-2">
        <textarea type="text" class="form-control" value="{{old('description')}}" id="description" name="description" placeholder="text" style="height: 100px"></textarea>
        <label for="description">Описание магазина</label>
    </div>
    <div class="form-floating mb-2">
        <input type="text" class="form-control" value="{{old('keywords')}}" id="keywords" name="keywords" placeholder="text">
        <label for="keywords">Ключевые слова</label>
    </div>
    <button class="btn btn-darksuccess w-100 mt-2"><i class="bi bi-shop"></i> Сохранить магазин</button>
</form>
@endsection