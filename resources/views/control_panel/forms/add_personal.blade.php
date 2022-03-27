@extends('control_panel.layout')
@section('main_content')
<div class="container">
  <nav aria-label="breadcrumb custom-cr">
    <ol class="breadcrumb crumb-custom">
        <li class="breadcrumb-item"><a href="/personal">Упровляющий персонал</a></li>
        <li class="breadcrumb-item active" aria-current="page">Добавление персонала</li>
    </ol>
  </nav>
  <div class="d-flex mb-1">
      <button class="btn btn-search-personal"><i class="bi bi-search text-lightsuccess"></i></button>
      <input type="search" id="search_input" class="search-personal py-2" placeholder="Найти пользователя">
  </div>
  <div id="invalid" class="text-danger"></div>
  <button id="search_personal" onclick="show_personal()" class="btn btn-darksuccess w-100 mt-2"><i class="bi bi-search small"></i> Найти</button>
</div>
@endsection