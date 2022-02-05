@extends('layouts.layout')
@section('title')Страница входа на сайт@endsection
@section('main_content')
<div class="container pb-2">
    <nav aria-label="breadcrumb custom-cr">
        <ol class="breadcrumb crumb-custom">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="/cabinet">Кабинет</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактирование</li>
        </ol>
    </nav>
    <div class="bg-light border my-3 rounded shadow-sm">
        <form action="/user_info_avatar" class="p-3" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-3">
                <div class="text-center border-bottom p-3">
                    <img src="/storage/avatars/{{$user->avatar}}" alt="mdo" class="rounded-circle mb-3" width="180" height="180">
                </div>
                <input class="form-control" name="avatar" type="file" id="avatar">
                @error('avatar')<div class="text-danger">{{$message}}</div>@enderror
            </div>
            <button class="btn btn-secondary w-100">Обновить аватарку</button>
        </form>
    </div>
    <form action="/user_info_edit" method="POST">
        <div class="bg-light border my-3 p-3 rounded shadow-sm">
            @csrf
            <div class="mb-2">Основная информация</div>
            <div class="row g-1">
                <div class="col">
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{$user->firstname}}" placeholder="text">
                        <label for="firstname"><i class="bi bi-person-fill"></i> Имя</label>
                        @error('firstname')<div class="text-danger">{{$message}}</div>@enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{$user->lastname}}" placeholder="text">
                        <label for="lastname"><i class="bi bi-person-fill"></i> Фамилия</label>
                        @error('lastname')<div class="text-danger">{{$message}}</div>@enderror
                    </div>
                </div>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="patronymic" name="patronymic" value="{{$user->patronymic}}" placeholder="text">
                <label for="patronymic"><i class="bi bi-person-fill"></i> Отчество</label>
                @error('patronymic')<div class="text-danger">{{$message}}</div>@enderror
            </div>
            <div class="form-floating mb-2">
                <div class="row g-1">
                    <div class="mb-2">Дата рождения</div>
                    <div class="col">
                        <select name="day" class="form-select" aria-label="Default select example">
                            <option disabled selected>День</option>
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option value="07">7</option>
                            <option value="08">8</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                    </div>
                    <div class="col-5">
                        <select name="mounth" class="form-select" aria-label="Default select example">
                            <option disabled selected>Месяц</option>
                            <option value="01">Январь</option>
                            <option value="02">Февраль</option>
                            <option value="03">Март</option>
                            <option value="04">Апрель</option>
                            <option value="05">Май</option>
                            <option value="06">Июнь</option>
                            <option value="07">Июль</option>
                            <option value="08">Август</option>
                            <option value="09">Сентябрь</option>
                            <option value="10">Октябрь</option>
                            <option value="11">Ноябрь</option>
                            <option value="12">Декабрь</option>
                        </select>
                    </div>
                    <div class="col">
                        <select name="year" class="form-select" aria-label="Default select example">
                            <option disabled selected>Год</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                            <option value="1979">1979</option>
                            <option value="1978">1978</option>
                            <option value="1977">1977</option>
                            <option value="1976">1976</option>
                            <option value="1975">1975</option>
                            <option value="1974">1974</option>
                            <option value="1973">1973</option>
                            <option value="1972">1972</option>
                            <option value="1971">1971</option>
                            <option value="1970">1970</option>
                            <option value="1969">1969</option>
                            <option value="1968">1968</option>
                            <option value="1967">1967</option>
                            <option value="1966">1966</option>
                            <option value="1965">1965</option>
                            <option value="1964">1964</option>
                            <option value="1963">1963</option>
                            <option value="1962">1962</option>
                            <option value="1961">1961</option>
                            <option value="1960">1960</option>
                            <option value="1959">1959</option>
                            <option value="1958">1958</option>
                            <option value="1957">1957</option>
                            <option value="1956">1956</option>
                            <option value="1955">1955</option>
                            <option value="1954">1954</option>
                            <option value="1953">1953</option>
                            <option value="1952">1952</option>
                            <option value="1951">1951</option>
                            <option value="1950">1950</option>
                            <option value="1949">1949</option>
                            <option value="1948">1948</option>
                            <option value="1947">1947</option>
                            <option value="1946">1946</option>
                            <option value="1945">1945</option>
                            <option value="1944">1944</option>
                            <option value="1943">1943</option>
                            <option value="1942">1942</option>
                            <option value="1941">1941</option>
                            <option value="1940">1940</option>
                        </select>
                    </div>
                    @error('day')<div class="text-danger">{{$message}}</div>@enderror
                    @error('mounth')<div class="text-danger">{{$message}}</div>@enderror
                    @error('year')<div class="text-danger">{{$message}}</div>@enderror
                </div>
            </div>
            <select name="gender" class="form-select" aria-label="Default select example">
                <option selected disabled>Укажите свой пол</option>
                <option value="1" @if($user->gender == 1) selected @endif >Мужской</option>
                <option value="2" @if($user->gender == 2) selected @endif >Женский</option>
            </select>
            @error('gender')<div class="text-danger">{{$message}}</div>@enderror
        </div>
        <div class="bg-light border my-3 p-3 rounded shadow-sm">
            <div class="mb-2">Контактные данные</div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="adress" name="adress" value="{{$user->adress}}" placeholder="text">
                <label for="adress"><i class="bi bi-house"></i> Домашний адрес</label>
                @error('adress')<div class="text-danger">{{$message}}</div>@enderror

            </div>
            <div class="form-floating mb-2">
                <input type="tel" class="form-control" id="tel" name="tel" value="{{$user->tel}}" placeholder="text">
                <label for="tel"><i class="bi bi-telephone"></i> Номер телефона</label>
                @error('tel')<div class="text-danger">{{$message}}</div>@enderror
            </div>
            <button class="btn btn-secondary w-100 mt-3">Обновить данные</button>
        </div>
    </form>
</div>
@endsection