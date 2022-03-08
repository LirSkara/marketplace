@extends('control_panel.layout')
@section('main_content')
<div class="container bg-light">

    <h1 class="h3 mb-3">Отзывы на проверке</h1>
      @foreach($reviews as $review)
      <div class="alert alert-light shadow-sm pb-0" role="alert">
        <div class="row">
            <div class="col-2">
                <img src="/storage/avatars/{{$users->find($review->user)->avatar}}" alt="mdo" class="rounded-circle" width="42" height="42">
            </div>
            <div class="col">
                <div style="position:relative;top: -6px;">
                    <span class="alert-heading fs-5 ms-2">{{$users->find($review->user)->lastname}} {{$users->find($review->user)->firstname}}</span>
                    <div class="ms-2" style="font-size: 9pt;">
                        @if($review->rating >= 5)
                            <i class="bi bi-star-fill text-darksuccess me-1"></i>
                            <i class="bi bi-star-fill text-darksuccess me-1"></i>
                            <i class="bi bi-star-fill text-darksuccess me-1"></i>
                            <i class="bi bi-star-fill text-darksuccess me-1"></i>
                            <i class="bi bi-star-fill text-darksuccess"></i>
                        @elseif($review->rating >= 4)
                            <i class="bi bi-star-fill text-darksuccess me-1"></i>
                            <i class="bi bi-star-fill text-darksuccess me-1"></i>
                            <i class="bi bi-star-fill text-darksuccess me-1"></i>
                            <i class="bi bi-star-fill text-darksuccess me-1"></i>
                            <i class="bi bi-star text-darksuccess"></i>
                        @elseif($review->rating >= 3)
                            <i class="bi bi-star-fill text-darksuccess me-1"></i>
                            <i class="bi bi-star-fill text-darksuccess me-1"></i>
                            <i class="bi bi-star-fill text-darksuccess me-1"></i>
                            <i class="bi bi-star text-darksuccess me-1"></i>
                            <i class="bi bi-star text-darksuccess"></i>
                        @elseif($review->rating >= 2)
                            <i class="bi bi-star-fill text-darksuccess me-1"></i>
                            <i class="bi bi-star-fill text-darksuccess me-1"></i>
                            <i class="bi bi-star text-darksuccess me-1"></i>
                            <i class="bi bi-star text-darksuccess me-1"></i>
                            <i class="bi bi-star text-darksuccess"></i>
                        @elseif($review->rating >= 1)
                            <i class="bi bi-star-fill text-darksuccess me-1"></i>
                            <i class="bi bi-star text-darksuccess me-1"></i>
                            <i class="bi bi-star text-darksuccess me-1"></i>
                            <i class="bi bi-star text-darksuccess me-1"></i>
                            <i class="bi bi-star text-darksuccess"></i>
                        @elseif($review->rating >= 0)
                            <i class="bi bi-star text-darksuccess me-1"></i>
                            <i class="bi bi-star text-darksuccess me-1"></i>
                            <i class="bi bi-star text-darksuccess me-1"></i>
                            <i class="bi bi-star text-darksuccess me-1"></i>
                            <i class="bi bi-star text-darksuccess"></i>
                        @endif
                    </div>
                </div>

            </div>
        </div>
        <p class="small">{{$review->text}}</p>
        <p style="font-size: 8pt">{{$review->created_at}}</p>
    </div>
      @endforeach

</div>
@endsection