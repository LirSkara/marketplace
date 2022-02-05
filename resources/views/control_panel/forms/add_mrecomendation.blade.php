@extends('control_panel.layout')
@section('main_content')
<div class="container">
  <nav aria-label="breadcrumb custom-cr">
    <ol class="breadcrumb crumb-custom">
        <li class="breadcrumb-item"><a href="/mrecomendations">Рекомендации</a></li>
        <li class="breadcrumb-item active" aria-current="page">Добавление рекомендации</li>
    </ol>
</nav>
  <form action="/cp_add_mrecomendation" method="POST">
    @csrf
    <div class="form-floating mb-2">
        <input type="text" class="form-control @error('href')is-invalid @enderror" value="{{old('product')}}" id="product" name="product" placeholder="text">
        <label for="product">Идентификатор товара</label>
    </div>
    <button class="btn btn-darksuccess w-100 mt-2"><i class="bi bi-plus-circle"></i> Добавить</button>
</form>
@endsection