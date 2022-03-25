@extends('layouts.layout')
@section('title')Marketplace - Добро пожаловать!@endsection
@section('main_content')
<div class="container-fluid px-lg-5">
    <div class="row px-lg-3">
        <div class="col-12">
            <div class="row mt-lg-5">
                <div class="col-12 mb-3 px-2">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <div style="display: none">{{$count = 0}}</div>
                            @foreach($slides as $slide)
                            @if(isset($per))
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$count}}" aria-label="Slide {{$count}}"></button>
                            @endif
                            <div style="display: none">{{$per = 0}}</div>
                            <div style="display: none">{{$count = ++$count}}</div>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            <div style="display: none">{{$count = 0}}</div>
                            @foreach($slides as $slide)
                                <a href="{{$slide->href}}" class="carousel-item @if($count == 0)active @endif">
                                <img src="/storage/slides/{{$slide->image}}" class="d-block w-100 rounded-3 carousel-img" alt="...">
                                </a>
                                <div style="display: none">{{$count = ++$count}}</div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-lg-4 g-2 mx-auto">
            @foreach($collections as $collection)
            <div class="col">
                <a href="{{$collection->href}}" class="">
                    <div class="rounded-3 divimg">
                        <img class="img-custom rounded-3 h-collections" src="/storage/collections/{{$collection->image}}" alt="">
                    </div>
                </a>
            </div>
            @endforeach 
        </div>
        <div class="row row-cols-1 row-cols-lg-2 g-2 mx-auto">
            @foreach($mactions as $maction)
            <div class="col mt-0">
                <a href="{{$maction->href}}"><img class="wh-mactions my-2 rounded-3 w-100" src="/storage/mactions/{{$maction->image}}" alt=""></a>
            </div>
            @endforeach
        </div>
        <div class="mt-3 px-3">
            <h5 class="fw-bold">Возможно, вам понравится</h5>
        </div>
        <div class="row g-2 g-lg-4 row-cols-2 row-cols-lg-6 mt-0 mb-3 px-3">
            @foreach($mrecomendation as $item)
                @foreach($products->where('id', $item->product) as $product)
                    <div class="col mb-3 small">
                        <a href="/product{{$item->id}}" class="text-decoration-none text-dark">
                            <div class="text-center"><img class="img-width-one rounded-3" style="height: 200px; object-fit: cover;" src="/storage/product/cover/{{$product->image}}" alt="..."></div>
                            <div class="mt-2"><span class="fw-bold me-2">{{$product->price}} ₽</span></div>
                            <div class="text-muted">{{$product->name}}</div>
                        </a>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
<script>
    home.classList.remove('text-muted')
    home.classList.add('text-darksuccess')
</script>
@endsection