@extends('control_panel.layout')
@section('main_content')
<div class="container-fluid px-lg-5 mt-lg-1">

    <h1 class="h3 mb-3 px-lg-2">Главная страница</h1>
    
    <div class="row row-cols-1 row-cols-lg-2 px-lg-2">
        <div class="col">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="fs-3"><i class="bi bi-graph-up"></i> Статистика</div>
                    <div>Всего продаж за месяц: 0</div>
                    <div>Сумма продаж за месяц: 0 ₽</div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="fs-3"><i class="bi bi-person"></i> Посетители: 0</div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection