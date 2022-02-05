@extends('control_panel.layout')
@section('main_content')
<div class="container">
  <nav aria-label="breadcrumb custom-cr">
    <ol class="breadcrumb crumb-custom">
        <li class="breadcrumb-item"><a href="/collections">Подборки</a></li>
        <li class="breadcrumb-item active" aria-current="page">Редактирование подборки</li>
    </ol>
</nav>
  <form action="/cp_edit_collection/{{$item->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <img src="/storage/collections/{{$item->image}}" style="object-fit: cover;height:200px;" class="d-block w-100" alt="...">
    <div class="form-floating mb-2">
        <input type="file" class="form-control @error('image')is-invalid @enderror" id="image" name="image" placeholder="text">
        <label for="image" style="transform: scale(.75) translateY(-1rem) translateX(.15rem);">Выберите изображение</label>
    </div>
    <div class="form-floating mb-2">
        <input type="text" class="form-control @error('href')is-invalid @enderror" value="{{$item->href}}" id="href" name="href" placeholder="text">
        <label for="href">Ссылка для перехода</label>
    </div>
    <button class="btn btn-darksuccess w-100 mt-2"><i class="bi bi-plus-circle"></i> Сохранить</button>
</form>
@endsection