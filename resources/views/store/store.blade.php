@extends('store.layout')
@section('main_content')
<div class="text-dark pb-2">
    <div class="mb-2">

        <div class="px-2">
            <img src="/storage/store/cover/{{$item->image}}" class="w-100 rounded-3 action-img" alt="855960469.jpg">
        </div>

        <div class="px-2">
            <div class="container">
                <div class="my-1">
                    <h1 class="fw-normal mt-2">{{$item->name}}</h1>
                    {{-- <p class="mb-0 text-muted"><i class="bi bi-geo-alt-fill"></i> Г. Дербент, ул. Чапаева 36</p><p class="mb-2 text-muted"><i class="bi bi-telephone-fill"></i> 89387923883</p> --}}
                </div>
                <p class="display-6 fs-6">{{$item->description}}</p>
            </div>
        </div>

        <div class="px-2">

            <div class="card mb-2">
                <div class="card-body">
                    <div class="fs-3"><i class="bi bi-graph-up"></i> Статистика</div>
                    <div>Всего продаж за месяц: 123</div>
                    <div>Сумма продаж за месяц: 1 200 450 ₽</div>
                </div>
            </div>
            
        </div>

    </div>
</div>
@endsection