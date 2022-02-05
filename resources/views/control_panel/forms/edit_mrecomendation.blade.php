@extends('control_panel.layout')
@section('main_content')
<div class="container">
  <nav aria-label="breadcrumb custom-cr">
    <ol class="breadcrumb crumb-custom">
        <li class="breadcrumb-item"><a href="/mrecomendations">Рекомендации</a></li>
        <li class="breadcrumb-item active" aria-current="page">Редактирование рекомендации</li>
    </ol>
</nav>
  <form action="/cp_edit_mrecomendation/{{$item->id}}" method="POST">
    @csrf
    <div class="form-floating mb-2">
        <input type="text" class="form-control @error('href')is-invalid @enderror" value="{{$item->product}}" id="product" name="product" placeholder="text">
        <label for="product">Идентификатор товара</label>
    </div>
    <button class="btn btn-darksuccess w-100 mt-2"><i class="bi bi-plus-circle"></i> Сохранить</button>
</form>
@endsection