@extends('layouts.layout')
@section('title')Страница входа на сайт@endsection
@section('main_content')
<div class="container py-lg-5">
    <div class="sign-in-block bg-white p-3">
        <div class="text-center">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><i class="bi bi-box-arrow-in-right"></i> Войти</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="bi bi-person-plus"></i> Регистрация</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="card border-0">
                        <div class="card-body pt-3 text-black">
                            <form action="/login" method="POST">
                                @csrf
                                <h5 class="fw-normal fs-3 mb-3 pb-3" style="letter-spacing: 1px;">Вход в личный кабинет</h5>

                                <div class="form-outline mb-4">
                                    <input type="email" placeholder="Email почта" name="email" class="form-control form-control-lg" />
                                    @error('email')<div class="text-danger">{{$message}}</div>@enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password" placeholder="Введите свой пароль" class="form-control form-control-lg" />
                                    @error('password')<div class="text-danger">{{$message}}</div>@enderror
                                </div>

                                <div class="pt-1 mb-4">
                                    <button class="btn btn-darksuccess btn-lg btn-block">Войти в личный кабинет</button>
                                </div>

                                <a class="small text-muted" href="#!">Забыли пароль?</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card border-0">
                        <div class="card-body pt-3 text-black">
                            <form action="/register" method="POST">
                                @csrf
                                <h5 class="fw-normal fs-3 mb-3 pb-3" style="letter-spacing: 1px;">Регистрация аккаунта</h5>

                                <div class="form-outline mb-4">
                                    <input type="email" placeholder="Email почта" name="email" class="form-control form-control-lg" />
                                    @error('email')<div class="text-danger">{{$message}}</div>@enderror
                                </div>


                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-outline mb-4">
                                            <input type="password" name="password" placeholder="Придумайте пароль" class="form-control form-control-lg" />
                                            @error('password')<div class="text-danger">{{$message}}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-outline mb-4">
                                            <input type="password" name="password_confirmation" placeholder="Повторите пароль" class="form-control form-control-lg" />
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-1 mb-4">
                                    <button class="btn btn-darksuccess btn-lg btn-block">Регистрация</button>
                                </div>

                                <a class="small text-muted" href="#!">Забыли пароль?</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    sign_in.classList.remove('text-muted')
    sign_in.classList.add('text-darksuccess')
</script>
@endsection