@extends('control_panel.layout')
@section('main_content')
<div class="container">

    <h1 class="h3 mb-3">Главная страница</h1>

    <div class="card mb-2">
        <div class="card-body">
            <div class="fs-3"><i class="bi bi-graph-up"></i> Статистика</div>
            <div>Всего продаж за месяц: 123</div>
            <div>Сумма продаж за месяц: 1 200 450 ₽</div>
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-body">
            <div class="fs-3"><i class="bi bi-person"></i> Посетители</div>
            <div class="fs-1">14.456</div>
            <div class="small text-success">На 5% больше, чем в прошлом месяце</div>
        </div>
    </div>

</div>
@endsection