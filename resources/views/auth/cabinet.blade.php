@extends('layouts.layout')
@section('title')Страница входа на сайт@endsection
@section('main_content')
<div class="container py-lg-5">
    <nav aria-label="breadcrumb custom-cr">
        <ol class="breadcrumb crumb-custom">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Личный кабинет</li>
        </ol>
    </nav>
    {{-- @if(!$user->email_verified_at)
    <div class="alert alert-warning shadow-sm small" role="alert">
        Ваш Email еще не подтверждён, <a href="" class="alert-link">нажмите</a> для повторной отправки письма на почту.
    </div>
    @endif --}}

    <div class="dropdown text-center">
        
        
    </div>
    <div class="row">
        <div class="col">
            <div class="btn-group w-100" role="group" aria-label="Basic example">
                <a href="#" class="link-dark text-decoration-none dropdown-toggle btn btn-light w-100 text-start" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/storage/avatars/{{$user->avatar}}" alt="mdo" class="rounded-circle" width="32" height="32">
                    <span class="ms-2">
                        @if($user->firstname == ''){{$user->email}}@else{{$user->lastname}} {{$user->firstname}}@endif
                    </span>
                </a>
                <ul class="dropdown-menu small w-100 py-0" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item border-bottom py-2" href="/user_info_edit"><i class="bi bi-person-fill"></i> Мой профиль</a></li>
                    <li><a class="dropdown-item py-2 border-bottom" href="#"><i class="bi bi-info-circle"></i> Полезная информация</a></li>
                    <li><a class="dropdown-item py-2 border-bottom" href="#"><i class="bi bi-info-circle"></i> Подробнее о нас</a></li>
                    <li><a class="dropdown-item py-2 border-bottom" href="#"><i class="bi bi-info-circle"></i> Защита прав потребителей</a></li>
                    @if($user->status == 9)
                        <li><a class="dropdown-item py-2" href="/control_panel"><i class="bi bi-toggles"></i> Панель управления</a></li>
                    @elseif($user->status == 2)
                        <li><a class="dropdown-item py-2" href="/store"><i class="bi bi-shop"></i> Мой магазин</a></li>
                    @endif
                </ul>
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-danger pt-2"><i class="bi bi-box-arrow-right"></i></и>
            </div>
            <div class="row row-cols-3 g-2 mt-1">
                <div class="col">
                    <a href="/delivery" class="card shadow-sm small p-3 text-center text-decoration-none text-dark">
                        <i class="bi bi-box-seam fs-1 text-primary"></i>
                        Доставка
                        <span class="small text-muted">Не ожидается</span>
                    </a>
                </div>
                <div class="col">
                    <a href="/favorites" class="card shadow-sm small p-3 text-center text-decoration-none text-dark">
                        <i class="bi bi-bookmark-heart fs-1 text-danger"></i>
                        Избранное
                        <span class="small text-muted">Товаров: {{$favourites_count}}</span>
                    </a>
                </div>
                <div class="col">
                    <a href="/cart" class="card shadow-sm small p-3 text-center text-decoration-none text-dark">
                        <i class="bi bi-cart4 fs-1 text-info"></i>
                        Корзина
                        <span class="small text-muted">Товаров: {{$cart_count}}</span>
                    </a>
                </div>
                {{-- <div class="col">
                    <a href="/sale" class="card shadow-sm small p-3 text-center text-decoration-none text-dark">
                        <i class="bi bi-percent fs-1 text-warning"></i>
                        Скидка
                        <span class="small text-muted">3%</span>
                    </a>
                </div> --}}
                {{-- <div class="col">
                    <a href="/coupons" class="card shadow-sm small p-3 text-center text-decoration-none text-dark">
                        <i class="bi bi-collection fs-1 text-success"></i>
                        Купоны
                        <span class="small text-muted">У меня: 2</span>
                    </a>
                </div> --}}
                {{-- <div class="col">
                    <a href="/stocks" class="card shadow-sm small p-3 text-center text-decoration-none text-dark">
                        <i class="bi bi-stars fs-1 text-purple"></i>
                        Акции
                        <span class="small text-muted">Всего: 1</span>
                    </a>
                </div> --}}
                {{-- <div class="col">
                    <a href="/expenses" class="card shadow-sm small p-3 text-center text-decoration-none text-dark">
                        <i class="bi bi-cash-coin fs-1 text-info"></i>
                        Финансы
                        <span class="small text-muted">Всего: 0 ₽</span>
                    </a>
                </div>
                <div class="col">
                    <a href="/purchases" class="card shadow-sm small p-3 text-center text-decoration-none text-dark">
                        <i class="bi bi-bag-check fs-1 text-primary"></i>
                        Покупки
                        <span class="small text-muted">Всего: 0</span>
                    </a>
                </div>
                <div class="col">
                    <a href="/activity" class="card shadow-sm small p-3 text-center text-decoration-none text-dark">
                        <i class="bi bi-activity fs-1 text-danger"></i>
                        Активность
                        <span class="small text-muted">Действий: {{$reviews_count}}</span>
                    </a>
                </div> --}}
            </div>
        </div>
        <div class="col">
            <div class="card w-100 mt-3 mt-lg-0 shadow-sm">
                <div class="card-header">
                    <i class="bi bi-clock-history"></i> Ближайшие доставки
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Доставок нет</li>
                </ul>
            </div>
        </div>
    </div>

    
</div>
<div style="margin-bottom: 65px;"></div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content pb-2 pt-4">
            <h5 class="text-center" id="exampleModalLabel">Вы уверены?</h5>
            <div class="m-3 text-center">
                <a href="/exit" class="btn btn-danger">Выйти из аккаунта</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
            </div>
        </div>
    </div>
</div>
@endsection