<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="{{route('web.main.index')}}" class="nav-link link-dark px-2 active" aria-current="page">Главная</a></li>
            <li class="nav-item"><a href="{{route('web.catalog.index')}}" class="nav-link link-dark px-2">Каталог</a></li>
            <li class="nav-item"><a href="{{route('web.shops.index')}}" class="nav-link link-dark px-2">Адреса магазинов</a></li>
            <li class="nav-item"><a href="{{route('web.contacts.index')}}" class="nav-link link-dark px-2">Контакты</a></li>
        </ul>
    </div>
</nav>
<header class="py-3 border-bottom bg-header">
    <div class="container d-flex flex-wrap justify-content-center align-items-center">
        <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <img src="{{url('/img/red-smoke.png')}}" height="75" width="75">
        </a>
        <form action="{{route('web.catalog.index')}}" method="get" class="col-12 col-lg-6 mb-3 mb-lg-0 ">
            <input type="search" name="search" class="form-control header-search" placeholder="Поиск" aria-label="Search"
            value="{{$filterValues['search'] ?? null}}">
        </form>
        <div class="d-flex col-lg-2 mb-3 mb-lg-0 me-lg-auto justify-content-end">
            @if(!Auth::guard('web')->check())
                <a type="button"
                   class="btn btn-outline-dark"
                   data-bs-toggle="modal"
                   data-bs-target="#loginModal"
                >{{ __('view/header.login') }}</a>
            @else
                <form action="{{ route('web.auth.logout') }}" method="POST" class="p-0 m-0">
                    @csrf
                    @method('POST')
                    <button type="submit"
                            class="btn btn-outline-dark"
                    >{{ __('view/header.logout') }}</button>
                </form>
            @endif
        </div>
    </div>
</header>
<nav class="py-2 mb-4">
    <div class="container d-flex">
        <ul class="nav me-auto d-flex justify-content-around" style="flex-grow: 1">
            <li class="nav-item"><a href="{{route('web.catalog.index', ['categoryId' => 1])}}" class="nav-link link-dark px-3 active" aria-current="page">Жидкости</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-3 active" aria-current="page">Одноразки</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-3">Расходники</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-3">Устройства</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-3">Испарители</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-3">Аксессуары</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-3">Табачные изделия</a></li>
        </ul>
    </div>
</nav>

@if(!Auth::guard('web')->check())
    @include('layouts.partials.auth-modal')
@endif
