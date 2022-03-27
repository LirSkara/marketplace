@extends('control_panel.layout')
@section('main_content')
<div class="container">

    <ul class="list-group">
        <li class="list-group-item bg-darksuccess text-white" aria-current="true">
            <div class="row">
                <div class="col-7 fs-5">Управление сайта</div>
                <div class="col text-end">
                    <a href="/cp_add_personal" class="btn btn-light py-1" style="font-size: 10pt;"><i class="bi bi-plus-circle"></i> Добавить</a>
                </div>
            </div>
        </li>
        <li class="list-group-item px-3 bg-light text-dark text-decoration-none d-flex py-2 d-flex flex-column">
            <h3>Админы</h3>
            <div class="d-flex flex-column">
                @foreach($users->where('status', 9) as $admin)
                    <div class="d-flex py-1">
                        @if($admin->image != '')
                            <img class="rounded-pill me-2" width="40px" height="40px" src="/storage/avatars/{{$admin->image}}" alt="">
                        @else
                            <img class="rounded-pill me-2" width="40px" height="40px" src="/img_default.webp" alt="">
                        @endif
                        <h5 class="mt-1">{{$admin->email}}</h5>
                        <span class="mt-1 ms-auto">{{$admin->id}}</span>
                    </div>
                @endforeach
            </div>
        </li>
        <li class="list-group-item px-3 bg-light text-dark text-decoration-none d-flex py-2 d-flex flex-column">
            <h3>Продавцы</h3>
            <div class="d-flex flex-column">
                @foreach($users->where('status', 2) as $salesman)
                    <div class="d-flex py-1">
                        @if($salesman->image != '')
                            <img class="rounded-pill me-2" width="40px" height="40px" src="/storage/avatars/{{$salesman->image}}" alt="">
                        @else
                            <img class="rounded-pill me-2" width="40px" height="40px" src="/img_default.webp" alt="">
                        @endif
                        <h5 class="mt-1">{{$salesman->email}}</h5>
                        <span class="mt-1 ms-auto">{{$salesman->id}}</span>
                    </div>
                @endforeach
            </div>
        </li>
    </ul>

</div>
@endsection