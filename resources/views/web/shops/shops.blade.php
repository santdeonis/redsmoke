@extends('layouts.web')

@section('title')
    {{ __('view/contact.title') }}
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h3>Адреса магазинов</h3>
                    <ul class="list-group">
                        <li class="list-group-item">Барнаул, Комсомольский проспект 102а</li>
                        <li class="list-group-item">Барнаул, проспект Строителей 16</li>
                        <li class="list-group-item">Барнаул, улица Белинского 6</li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <div style="position:relative;overflow:hidden;"><a
                            href="https://yandex.ru/maps/org/red_smoke/122086013976/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:0px;">Red Smoke</a><a
                            href="https://yandex.ru/maps/197/barnaul/category/vape_shop/89800553252/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:14px;">Вейп-шоп в Барнауле</a><a
                            href="https://yandex.ru/maps/197/barnaul/category/tobacco_and_smoking_accessories_shop/184107903/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:28px;">Магазин табака и курительных
                            принадлежностей в Барнауле</a>
                        <iframe
                            src="https://yandex.ru/map-widget/v1/?ll=83.787438%2C53.346925&mode=search&oid=122086013976&ol=biz&z=17.04"
                            width="560" height="400" frameborder="1" allowfullscreen="true"
                            style="position:relative;"></iframe>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/js/bootstrap.bundle.min.js"></script>

    </main>
@endsection
