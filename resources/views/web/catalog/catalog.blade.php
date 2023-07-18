@extends('layouts.web')

@section('title')
    {{ __('view/contact.title') }}
@endsection
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="grid search">
                        <div class="grid-body">
                            <div class="row">
                                <!-- Фильтр -->
                                <div class="col-md-2">
                                    <h2 class="grid-title"> Фильтр</h2>
                                    <hr>
                                    <form action="{{route('web.catalog.index')}}" method="get">
                                        <div class="mb-3">
                                            <label for="filterCategory">Категория</label>
                                            <select class="form-select" name="categoryId" id="filterCategory">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"
                                                            @if(isset($filterValues['categoryId']))
                                                            @if($category->id == $filterValues['categoryId'])
                                                            selected
                                                        @endif
                                                        @endif
                                                    >
                                                        {{$category->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="filterManufacturer">Производитель</label>
                                            <select class="form-select" name="manufacturer" id="filterManufacturer">
                                                @foreach($manufacturers as $manufacturer)
                                                    <option value="{{$manufacturer}}"
                                                            @if(isset($filterValues['manufacturer']))
                                                            @if($manufacturer == $filterValues['manufacturer'])
                                                            selected
                                                        @endif
                                                        @endif
                                                    >
                                                        {{$manufacturer}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="filterPrice">Цена</label>
                                            <div class="input-group mb-3" id="filterPrice">
                                                <span class="input-group-text">От</span>
                                                <input type="number" min="0" step="50" class="form-control"
                                                       name="priceFrom" value="{{$filterValues['priceFrom'] ?? null}}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">До</span>
                                                <input type="number" min="0" step="50" class="form-control"
                                                       name="priceTo" value="{{$filterValues['priceTo'] ?? null}}">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Применить</button>
                                    </form>
                                </div>
                                <!--Основное окно -->
                                <div class="col-md-10">
                                    <div class="row">
                                        <!-- Сортировка -->
                                        <div class="col-sm-6">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-default dropdown-toggle"
                                                        data-bs-toggle="dropdown">
                                                    Сортировать по <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Название (А-Я)</a></li>
                                                    <li><a class="dropdown-item" href="#">Название (Я-А)</a></li>
                                                    <li><a class="dropdown-item" href="#">Цена (возрастание)</a></li>
                                                    <li><a class="dropdown-item" href="#">Цена (убывание)</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Товары -->
                                    <div class="album py-5 bg-light">
                                        <div class="container">
                                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                                                @foreach($data as $item)
                                                    <div class="col">
                                                        <div class="card shadow-sm">
                                                            <img src="{{url('/img/' . $item->photo)}}"
                                                                 class="bd-placeholder-img" width="200px"
                                                                 height="225px">
                                                            <div class="card-body">
                                                                <p class="card-text">
                                                                    <a href="{{route('web.product.view', ['id' => $item->id])}}"
                                                                       class="link-dark">
                                                                        {{$item->name}}</a>
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
                                    <div class="mt-3">
                                        {{ $data->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
