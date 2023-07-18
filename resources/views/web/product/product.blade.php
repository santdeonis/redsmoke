@extends('layouts.web')

@section('title')
    {{ __('view/contact.title') }}
@endsection

@section('content')
    <main>
        <div class="container border-bottom">
            <h1 class="mt-5 border-bottom">{{$data->name}}</h1>
            <div class="row mt-4">
                <div class="col-lg-6">
                    <img src="{{url('/img/' . $data->photo)}}" alt="Product Image" class="img-fluid" style="height: 500px">
                </div>
                <div class="col-lg-4">
                    <h4>Информация</h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="price">Цена: {{$data->price}}</span>
                        </li>
                        <li class="list-group-item">Производитель: {{$data->manufacturer}}</li>
                        <li class="list-group-item">Вес: {{$data->weight}} г</li>
                        <li class="list-group-item">
                            Описание: {{$data->description}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
