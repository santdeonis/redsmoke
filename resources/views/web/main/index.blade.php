@extends('layouts.web')

@section('title')
    {{ __('view/main.title') }}
@endsection

@section('content')
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{url('/img/banner1.jpg')}}" width="100%" height="300px">
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="300px" xmlns="http://www.w3.org/2000/svg"
                         aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#777"/>
                    </svg>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="300px" xmlns="http://www.w3.org/2000/svg"
                         aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#777"/>
                    </svg>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="pricing-header p-3 pb-md-4 mx-auto text-start">
        <h2 class="display-5 fw-normal">
            Новинки
        </h2>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
                @foreach($data as $item)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{url('/img/' . $item->photo)}}" class="bd-placeholder-img" width="200px" height="225px">
                        <div class="card-body">
                            <p class="card-text">
                                {{$item->name}}
                            </p>
                            <p class="card-text fw-bold">
                                {{$item->price}} руб.
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="pricing-header p-3 pb-md-4 mx-auto text-start">
        <h2 class="display-5 fw-normal">
            Популярное
        </h2>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
                @foreach($data as $item)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{url('/img/' . $item->photo)}}" class="bd-placeholder-img" width="200px" height="225px">
                            <div class="card-body">
                                <p class="card-text">
                                    {{$item->name}}
                                </p>
                                <p class="card-text fw-bold">
                                    {{$item->price}} руб.
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
