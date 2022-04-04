@extends('layouts.layout')
@section('title')Корзина покупок@endsection
@section('main_content')
<div class="container py-lg-4">
    <nav aria-label="breadcrumb custom-cr">
        <ol class="breadcrumb crumb-custom">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Корзина покупок</li>
        </ol>
    </nav>
    <h1 class="fs-2">Корзина покупок</h1>
    <div class="bg-white my-3">
        <div class="my-2 text-center">
            @if(Auth()->check())
                @if($cart->where('user_id',$user->id)->count() > 0)
                <div class="row row-cols-2">
                    <div class="col-9 row row-cols-1 row-cols-lg-2">
                        @foreach($cart as $item)
                            <div class="col">
                                <div class="card mb-2 shadow">
                                    <div class="row g-0">
                                        <div class="col-5">
                                            <img src="/storage/product/cover/{{$products->find($item->product_id)->image}}" style="object-fit: cover;height:145px;width:100%; border-top-left-radius: 4px; border-bottom-right-radius: 4px;" alt="">
                                            <div class="d-flex">
                                                <button class="btn" id="m{{$item->id}}" onclick="minus_product(this.id)"><i class="bi bi-dash"></i></button>
                                                <span class="py-2" id="c{{$item->id}}">{{$item->colvo}}</span>
                                                <button class="btn" id="p{{$item->id}}" onclick="plus_product(this.id)"><i class="bi bi-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body">
                                                <div class="">
                                                    <span id="price{{$item->id}}" class="fs-6">{{$products->find($item->product_id)->price}}</span><span>р</span>
                                                </div>
                                                <div class="fs-6">{{$products->find($item->product_id)->name}}</div>
                                                <div class="fs-6 text-muted">Артикул: {{$products->find($item->product_id)->article}}</div>
                                                <a class="mt-2 btn btn-danger text-decoration-none" href="/delete_cart/{{$item->id}}"><i class="bi bi-trash"></i> Удалить</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-3">
                        <div class="card mb-2 shadow d-flex flex-column text-start px-3 py-2">
                            <div class="d-flex">
                                <h3>Итого:</h3>
                                <span id="itogo" class="h3 ms-auto">{{$itogo}}</span><span class="h3 ms-1">р</span>
                            </div>
                            <form id="form">
                            @csrf  
                                <div class="d-flex gap-2">
                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Имя">
                                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Фамилия">
                                </div>
                                <select name="sposob" class="form-select mt-2" aria-label="Default select example">
                                    <option value="1">Доставка</option>
                                    <option value="2">Самовывоз</option>
                                </select>
                                <input type="text" name="adress" id="adress" class="form-control mt-2" placeholder="Адрес доставки">
                                <input type="tel" name="tel" id="tel" class="form-control mt-2" data-tel-input placeholder="Телефон">
                                <button class="btn bg-darksuccess text-white w-100 mt-2">Оформить</button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                    <img class="cart-image mb-3" src="https://www.joom.com/dist/3dea8e41e39b9de093eb7f84da259fb9.svg" alt="">
                    <h2 class="text-muted mb-3">Тут пока пусто</h2>
                    <a class="btn btn-darksuccess btn-lg mt-2" href="/"><i class="bi bi-house"></i> Вернуться к покупкам</a>
                @endif
            @else
                <img class="cart-image mb-3" src="https://www.joom.com/dist/3dea8e41e39b9de093eb7f84da259fb9.svg" alt="">
                <h2 class="text-muted mb-3">Умная корзина доступна после авторизации!</h2>
                <a class="btn btn-darksuccess btn-lg mt-2" href="/login"><i class="bi bi-person"></i> Войти в кабинет</a>
            @endif
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="btn_modalCart" data-bs-toggle="modal" data-bs-target="#modalCart">
    Launch static backdrop modal
</button>

<!-- Modal CartOrder -->
<div class="modal fade" id="modalCart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center fs-3">
                <i class="bi bi-check-circle d-block text-success fs-1"></i>Заказ оформлен
            </div>
            <div class="d-flex p-3 gap-2">
                <a href="/" class="btn btn-secondary w-50 btn-lg">На главную</a>
                <a href="/delivery" class="btn btn-darksuccess w-50 btn-lg">Мои доставки</a>
            </div>
        </div>
    </div>
</div>

<script>
    cart.classList.remove('text-muted')
    cart.classList.add('text-info')

    $(document).ready(function(){
        $("#form").submit(function(event) { //устанавливаем событие отправки для формы с id=form
            event.preventDefault(); //Отключаем обновление страницы

            var form_data = $(this).serialize(); //собераем все данные из формы

            $.ajax({
                type: "POST", //Метод отправки
                url: "/cart_order", //путь до php фаила отправителя
                data: form_data,
                success: function(data) {
                    if(data == 1) {
                        btn_modalCart.click()
                        document.getElementById('firstname').innerHTML = ''
                        document.getElementById('lastname').innerHTML = ''
                        document.getElementById('adress').innerHTML = ''
                        document.getElementById('tel').innerHTML = ''
                    }
                }
            });   
        });
    });
</script>
@endsection