@extends('control_panel.layout')
@section('main_content')
<div class="container">
  <nav aria-label="breadcrumb custom-cr">
    <ol class="breadcrumb crumb-custom">
        <li class="breadcrumb-item"><a href="/mactions">Акции</a></li>
        <li class="breadcrumb-item active" aria-current="page">Добавление акции</li>
    </ol>
</nav>
  <form action="/cp_add_maction" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-floating mb-2">
        <input type="file" class="form-control @error('image')is-invalid @enderror" id="image" name="image" placeholder="text">
        <label for="image" style="transform: scale(.75) translateY(-1rem) translateX(.15rem);">Выберите изображение</label>
    </div>
    <div class="form-floating mb-2">
        <input type="text" class="form-control @error('href')is-invalid @enderror" value="{{old('href')}}" id="href" name="href" placeholder="text">
        <label for="href">Ссылка для перехода</label>
    </div>
    <button class="btn btn-darksuccess w-100 mt-2"><i class="bi bi-plus-circle"></i> Добавить</button>
</form>
@endsection