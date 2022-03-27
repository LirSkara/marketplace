@extends('control_panel.layout')
@section('main_content')
<div class="container-fluid">
    <div class="d-flex mb-2">
        <a href="/cp_add_personal" class="text-dark px-1"><i class="bi bi-arrow-left fs-5"></i></a>
        <h3 class="mx-auto">{{$user->email}}</h3>
        @if($user->status != 9)
            <button class="btn py-0 px-1" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots-vertical fs-5"></i>
            </button>
            <ul class="dropdown-menu small py-0" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item border-bottom py-2" href="/user_info_edit"><i class="bi bi-trash me-1 text-danger"></i> Удалить профиль</a></li>
            </ul>
        @endif
    </div>
    <div class="d-flex">
        @if($user->image != '')
            <img src="/storage/avatars/{{$user->image}}" alt="...">
        @else
            <img class="user-personal-avatar rounded-pill" src="/img_default.webp" alt="...">
        @endif
        <div class="d-flex flex-column ms-3 ps-1 w-100">
            @if($user->status == 0) 
                <h3 id="person">Пользователь</h3>
                <button class="btn bg-darksuccess text-white w-100"><i class="bi bi-arrow-up"></i> Повысить</button>
            @elseif($user->status == 2)
                <h3 id="person">Продавец</h3>
                <div class="d-flex gap-1">
                    <button id="down{{$user->id}}" onclick="downgrade(this.id)" class="btn btn-danger w-50"><i class="bi bi-arrow-down"></i> Понизить</button>
                    <button id="up{{$user->id}}" onclick="raise(this.id)" class="btn bg-darksuccess text-white w-50"><i class="bi bi-arrow-up"></i> Повысить</button>
                </div>
            @elseif($user->status == 7)
                <h3>Модератор</h3>
                <div class="d-flex gap-1">
                    <button id="down{{$user->id}}" onclick="downgrade(this.id)" class="btn btn-danger w-50"><i class="bi bi-arrow-down"></i> Понизить</button>
                    <button id="up{{$user->id}}" onclick="raise(this.id)" class="btn bg-darksuccess text-white w-50"><i class="bi bi-arrow-up"></i> Повысить</button>
                </div>
            @elseif($user->status == 9)
                <h3>Админ</h3>
                <div class="bg-darksuccess text-white rounded-3 text-center py-1">Нельзя повысить или понизить</div>
            @endif
        </div>
    </div>
</div>
@endsection