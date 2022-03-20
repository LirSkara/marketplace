@extends('store.layout')
@section('main_content')
<div class="container">
    <h1 class="h3 mb-3">Мои новые заказы</h1>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Одиночные</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Корзины покупок</button>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

        @foreach($one_orders as $one_order)
        @if($product->find($one_order->product)->store == $store->where('user',auth()->user()->id)->first()->id)
        <div class="row">
            <div class="col">
                <div class="card mb-2">
                    <div class="row g-0">
                        <div class="col">
                            <div class="card-body px-3 pt-0">
                                <div class="fs-5">
                                    {{$one_order->id}})
                                    {{$product->find($one_order->product)->name}} <div class="small text-muted">#{{$product->find($one_order->product)->article}}</div>
                                </div>
                                <div class="border-bottom pb-1 fs-5">{{$one_order->summ}} ₽ за {{$one_order->kolvo}} шт</div>
                                <div class="pt-1">{{$one_order->lastname}} {{$one_order->firstname}}, {{$one_order->created_at}}</div>
                                <div>Способ доставки: 
                                    @if($one_order->sposob == 1)Доставка@else Самовывоз@endif
                                </div>
                                <div class="border-bottom pb-2">Телефон: <a href="tel:{{$one_order->tel}}">{{$one_order->tel}}</a></div>
                                <div class="py-1 px-3 bg-warning">Магазин: {{$store->find($product->find($one_order->product)->store)->name}} #{{$store->find($product->find($one_order->product)->store)->id}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach

        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
      </div>
      
</div>
@endsection