@extends('layouts.layout')
@section('main_content')
<div class="container">
    <nav aria-label="breadcrumb custom-cr">
        <ol class="breadcrumb crumb-custom">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="/brand/{{$product->store}}">{{$store->name}}</a></li>
            <li class="breadcrumb-item"><a href="/product/{{$product->id}}">{{$product->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Оформление заказа</li>
        </ol>
    </nav>
    <form action="/order_one/{{$product->id}}" method="POST">
        @csrf
    <div class="row">
        <div class="col">
            <div class="text-center"><img class="img-width-one rounded-3" src="/storage/product/cover/{{$product->image}}" alt="..." style="object-fit: cover;height:150px"></div>
        </div>
        <div class="col">
            <div class="fs-4">{{$product->name}}</div>
            <div><span class="fw-bold me-2 fs-5">{{$product->price}} ₽</span></div>
            <input name="kolvo" type="number" class="form-control mt-1 w-100 @error('kolvo')is-invalid @enderror" placeholder="Количество" min="1" value="{{old('kolvo')}}" required>
        </div>
    </div>
    <div class="fs-2 mt-3">Оформление покупки</div>
    <div class="row g-1 mt-1">
        <div class="col">
            <input name="firstname" value="{{old('firstname')}}" type="text" class="form-control @error('firstname')is-invalid @enderror" placeholder="Имя">
        </div>
        <div class="col">
            <input name="lastname" value="{{old('lastname')}}" type="text" class="form-control @error('lastname')is-invalid @enderror" placeholder="Фамилия">
        </div>
    </div>
        <select class="form-select my-1 @error('sposob')is-invalid @enderror" name="sposob">
            <option value="1" id="show" selected onclick="show(this.id)">Доставка</option>
            <option value="2" id="hide" onclick="show(this.id)">Самовывоз</option>
        </select>

        <input type="text" value="{{old('adress')}}" class="form-control my-1 @error('adress') is-invalid @enderror" placeholder="Укажите адрес доставки" name="adress" id="adress">
        <input type="tel"  value="{{old('tel')}}" data-tel-input class="form-control my-1 @error('tel') is-invalid @enderror" name="tel" placeholder="Номер телефона">

        <button class="btn btn-darksuccess btn-lg w-100">Оформить покупку</button>
    </form>

</div>
<script>
    function show(id){
        if(id == 'show'){document.getElementById('adress').style = 'display:block;'}
        if(id == 'hide'){document.getElementById('adress').style = 'display:none;'}
    }
</script>
@endsection