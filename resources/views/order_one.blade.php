@extends('layouts.layout')
@section('main_content')
<div class="container">
    <form action="/order" method="POST">
    <div class="row">
        <div class="col">
            <div class="text-center"><img class="img-width-one rounded-3" src="/storage/product/cover/{{$product->image}}" alt="..." style="object-fit: cover;height:150px"></div>
        </div>
        <div class="col">
            <div class="fs-4">{{$product->name}}</div>
            <div><span class="fw-bold me-2 fs-5">{{$product->price}} ₽</span></div>
            <input type="number" class="form-control mt-1 w-100" placeholder="Количество" min="1" value="0">
        </div>
    </div>
    <div class="fs-2 mt-3">Оформление покупки</div>
    <div class="row g-1 mt-1">
        <div class="col">
            <input type="text" class="form-control" placeholder="Имя">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Фамилия">
        </div>
    </div>
        <select class="form-select my-1" name="dostavka">
            <option disabled selected>Способ получения</option>
            <option value="1" id="show" onclick="show(this.id)">Доставка</option>
            <option value="2" id="hide" onclick="show(this.id)">Самовывоз</option>
        </select>

        <input type="text" class="form-control my-1" placeholder="Укажите адрес доставки" id="adress">
        <input type="tel" class="form-control my-1" placeholder="Номер телефона">

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