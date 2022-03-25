@extends('control_panel.layout')
@section('main_content')
<div class="container">

    <h1 class="h3 mb-3">Список всех магазинов</h1>
    <div class="row row-cols-1 row-cols-lg-3">
        @foreach ($stores as $store)
            <div class="col">
                <div class="card mb-2">
                    <div class="row g-0">
                        <div class="col-3">
                            <img src="/storage/store/cover/{{$store->image}}" style="object-fit: cover;height:86px;width:100%" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <div class="fs-5"><i class="bi bi-shop"></i> {{$store->name}}</div>
                                <div class="row row-cols-2">
                                    <div class="col">Товаров: {{$product::where('store',$store->id)->count()}}</div>
                                    <div class="col">Продажи: 0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection