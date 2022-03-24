@extends('store.layout')
@section('main_content')
<div class="container">
  <nav aria-label="breadcrumb custom-cr">
    <ol class="breadcrumb crumb-custom">
        <li class="breadcrumb-item"><a href="/store">Магазин</a></li>
        <li class="breadcrumb-item active" aria-current="page">Добавление продукта</li>
    </ol>
</nav>
  <form action="/add_product" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-2 fs-3">Основная информация</div>
    <div class="mb-3">
        @error('image'){{$message}}@enderror
        <input class="form-control" name="image" type="file" id="image">
    </div>
    <div class="form-floating mb-2">
        @error('article'){{$message}}@enderror
        <input type="text" class="form-control" value="{{old('article')}}" id="article" name="article" placeholder="text">
        <label for="article">Артикул</label>
    </div>
    <div class="form-floating mb-2">
        @error('name'){{$message}}@enderror
        <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="text">
        <label for="name">Название продукта</label>
    </div>
    <div class="form-floating mb-2">
        @error('description'){{$message}}@enderror
        <textarea type="text" class="form-control" id="description" name="description" placeholder="text" style="height: 100px">{{old('description')}}</textarea>
        <label for="description">Описание продукта</label>
    </div>
    <div class="form-floating mb-2">
        @error('ostatok'){{$message}}@enderror
        <input type="text" name="ostatok" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Остаток</label>
    </div>
    <select name="category" class="form-select mb-2" aria-label="Default select example">
        <option selected="" disabled="">Укажите категорию</option>
        @foreach($categories as $category)
            <option disabled="">-------- {{$category->name}} --------</option>
            @foreach($puncts as $punct)
                @if($punct->category == $category->id)
                    <option value="{{$punct->id}}">{{$category->name}} -> {{$punct->name}}</option>
                @endif
            @endforeach
        @endforeach
    </select>
    <div class="form-floating mb-2">
        @error('price'){{$message}}@enderror
        <input type="text" class="form-control" value="{{old('price')}}" id="price" name="price" placeholder="text">
        <label for="price">Стоимость</label>
    </div>
    <button class="btn btn-darksuccess w-100 mt-2"><i class="bi bi-file-earmark-plus"></i> Сохранить продукт</button>
</form>
@endsection