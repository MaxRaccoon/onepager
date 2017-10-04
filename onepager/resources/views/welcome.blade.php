@extends ('layouts.app')

@section('title')
    {{ $keys['MetaPageTitle'] }}
@endsection

@section('head')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
@endsection

@section('body')
    <header>
        <div class="container">

        </div>
    </header>
    <div class="slider">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach ($slides as $number => $slide)
                    <li data-target="#myCarousel" data-slide-to="{{ $number }}"
                        class="@if ($loop->first) active @endif"></li>
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @foreach ($slides as $slide)
                    <div class="item @if ($loop->first) active @endif">
                        <img src="{{ $slide['image'] }}" alt="{{ $slide['title'] }}">
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <div class="container">

        <nav class="slide-menu">
            @foreach ($menu as $item)
                <div class="block-shadow"><a href="{{ $item['url'] }}">{{ $item['title'] }}</a></div>
            @endforeach
        </nav>

    </div>
    <div class="block-panel white" id="company">
        <div class="container">
            <a href="#tehnlogy"><div class="chevron-down block-shadow">&nbsp;</div></a>
            <h1>{{ $keys['H1'] }}</h1>
            <p class="description">
                {{ $keys['CompanyDescription'] }}
            </p>
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="description">
                        <div id="map" style="width: 100%; height: 400px;"></div>
                    </div>
                    <script type="text/javascript">
                        ymaps.ready(init);
                        var myMap, myPlacemark;

                        function init(){
                            myMap = new ymaps.Map("map", {
                                center: [{{ $keys['MapLatitude'] }}, {{ $keys['MapLongitude'] }}],
                                zoom: 16
                            });

                            myPlacemark = new ymaps.Placemark(
                                    [{{ $keys['MapLatitude'] }}, {{ $keys['MapLongitude'] }}],
                                    {
                                        hintContent: '{{ $keys['MapTitle'] }}',
                                        balloonContent: '{{ $keys['MapDescription'] }}'
                                    });
                            // Создаем метку.
                            var placemark = new ymaps.Placemark(
                                    [{{ $keys['MapLatitude'] }}, {{ $keys['MapLongitude'] }}],
                            {
                                balloonContent: "{{ $keys['MapDescription'] }}",
                                iconContent: "{{ $keys['MapTitle'] }}"
                            }, {
                                preset: "twirl#yellowStretchyIcon",
                                // Отключаем кнопку закрытия балуна.
                                balloonCloseButton: false,
                                // Балун будем открывать и закрывать кликом по иконке метки.
                                hideIconOnBalloonOpen: true
                            });
                            myMap.geoObjects.add(myPlacemark);
                        }
                    </script>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="description">
                        <h3>{{ $keys['ContactTitle'] }}</h3>
                        {{ $keys['ContactDescription'] }}
                    </div>
                </div>
            </div>

            <br /><br />
            <div class="center">
                <strong class="query_text">Хотите принять участие в программе по льготной реализации глюкометров
                    Gmate Life?</strong>
                &nbsp;&nbsp;
                <button type="button" class="btn btn-orange btn-lg" data-toggle="modal" data-target="#myModal">
                    Да! Подать заявку
                </button>
            </div>
            <br /><br />
        </div>
    </div>
    <div class="block-panel gray" id="tehnlogy">
        <div class="container">
            <a href="#product"><div class="chevron-down block-shadow">&nbsp;</div></a>
            <h2>{{ $keys['TehnlogyTitle'] }}</h2>
            <p>{{ $keys['TehnlogyDescription'] }}</p>
            @foreach($technologies AS $technology)
                <div class="technologies">
                    <div class="title">{!! $technology['title'] !!}</div>
                    <div class="description">{{ $technology['description'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="block-panel dark-gray" id="product">
        <div class="container">
            <a href="#company"><div class="chevron-down block-shadow">&nbsp;</div></a>
            <h2>{{ $keys['ProductTitle'] }}</h2>
            @foreach($products AS $product)
                <div class="products">
                    <div class="img"><img src="{{ $product['image_thumb'] }}" class="img-circle" /></div>
                    <div class="description">{{ $product['description'] }}</div>
                </div>
            @endforeach
            <br /><br />
            <div class="center">
                <strong class="query_text">Хотите принять участие в программе по льготной реализации глюкометров
                    Gmate Life?</strong>
                &nbsp;&nbsp;
                <button type="button" class="btn btn-orange btn-lg" data-toggle="modal" data-target="#myModal">
                    Да! Подать заявку
                </button>
            </div>
            <br /><br />
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Заявка на участие в программе
                        льготной реализации глюкометра Gmate Life</h4>
                </div>
                <div class="modal-body">
                    <form id="query_request">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Фамилия Имя Отчество">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="dt_born">Дата рождения</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                        <input type="text" class="form-control datetimepicker" id="dt_born"
                                               name="dt_born" placeholder="{{  Carbon\Carbon::today()->format('d.m.Y') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="place_born">Место рождения</label>
                                    <input type="text" class="form-control" id="place_born"
                                           name="place_born" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="post_address">Почтовый адрес</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
                                        <input type="text" class="form-control" id="post_address"
                                               name="post_address" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="phone">Номер телефона</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                        <input type="text" class="form-control phone" id="phone"
                                               name="phone" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Ваш E-mail">
                            </div>
                        </div>

                        <div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="apply_check"> Согласие на обработку персональных данных
                                    в соответствии с Федеральным законом от 27.07.2006 N 152-ФЗ
                                </label>
                            </div>
                        </div>

                        <div class="bs-callout bs-callout-danger" id="error">
                            <h4>Нужно заполнить все поля!</h4>
                        </div>
                        <div class="bs-callout bs-callout-info" id="success">
                            <h4>Спасибо! Ваш запрос отправлен</h4>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-orange" id="sendQuery">Отправить заявку</button>
                </div>
            </div>
        </div>
    </div>
@endsection