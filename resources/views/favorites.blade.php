@extends('layouts.layout')
@section('title')Избранное@endsection
@section('main_content')
<div class="container">
    <nav aria-label="breadcrumb custom-cr">
        <ol class="breadcrumb crumb-custom">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Избранное</li>
        </ol>
    </nav>
    <h1 class="fs-2">Избранное</h1>
    <div class="bg-white my-3 p-3">
        <div class="text-center">
            <h6 class="text-muted">Здесь появятся товары, отмеченные как понравившиеся значком <i class="bi bi-heart-fill text-danger"></i></h6>
            <a class="btn btn-darksuccess btn-lg mt-2" href="/"><i class="bi bi-house"></i> Вернуться к покупкам</a>
        </div>
    </div>
</div>
<script>
    heart.classList.remove('text-muted')
    heart.classList.add('text-danger')
</script>
@endsection