@extends('store.layout')
@section('main_content')
<div class="container">
  <nav aria-label="breadcrumb custom-cr">
    <ol class="breadcrumb crumb-custom">
        <li class="breadcrumb-item"><a href="/store">Магазин</a></li>
        <li class="breadcrumb-item active" aria-current="page">Добавление магазина</li>
    </ol>
</nav>
  <form action="/store_add" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-2 fs-3">Основная информация</div>
    <div class="mb-3">
        @error('image'){{$message}}@enderror
        <input class="form-control" name="image" type="file" id="image">
    </div>
    <div class="form-floating mb-2">
        @error('name'){{$message}}@enderror
        <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="text">
        <label for="name">Название магазина</label>
    </div>
    <div class="form-floating mb-2">
        @error('description'){{$message}}@enderror
        <textarea type="text" class="form-control" id="description" name="description" placeholder="text" style="height: 100px">{{old('description')}}</textarea>
        <label for="description">Описание магазина</label>
    </div>
    <div class="form-floating mb-2">
        @error('keywords'){{$message}}@enderror
        <input type="text" class="form-control" value="{{old('keywords')}}" id="keywords" name="keywords" placeholder="text">
        <label for="keywords">Ключевые слова</label>
    </div>
    <div class="form-floating mb-2">
        @error('email'){{$message}}@enderror
        <input type="email" class="form-control" value="{{old('email')}}" id="email" name="email" placeholder="text">
        <label for="email">Email</label>
    </div>
    <div class="form-floating mb-2">
        @error('tel'){{$message}}@enderror
        <input type="text" class="form-control" value="{{old('tel')}}" id="tel" name="tel" placeholder="text">
        <label for="tel">Номер телефона</label>
    </div>
    <div class="form-floating mb-2">
        @error('city'){{$message}}@enderror
        <input type="text" class="form-control" value="{{old('city')}}" id="city" name="city" placeholder="text">
        <label for="city">Город</label>
    </div>
    <div class="form-floating mb-2">
        @error('adress'){{$message}}@enderror
        <input type="text" class="form-control" value="{{old('adress')}}" id="adress" name="adress" placeholder="text">
        <label for="adress">Адрес</label>
    </div>
    <button class="btn btn-darksuccess w-100 mt-2"><i class="bi bi-shop"></i> Сохранить магазин</button>
</form>
@endsection