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
        <div class="container">

            <nav class="slide-menu">
                @foreach ($menu as $item)
                    <div class="block-shadow"><a href="{{ $item['url'] }}">{{ $item['title'] }}</a></div>
                @endforeach
            </nav>

        </div>
    </div>
    <div class="block-panel white" id="company">
        <div class="container">
            <div class="chevron-down block-shadow">&nbsp;</div>
            <h1>{{ $keys['H1'] }}</h1>
            <p class="description">
                {{ $keys['CompanyDescription'] }}
            </p>
            <div class="row">
                <div class="col-xs-6">
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
                <div class="col-xs-6">
                    <div class="description">
                        <h3>{{ $keys['ContactTitle'] }}</h3>
                        {{ $keys['ContactDescription'] }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-panel gray" id="tehnlogy">
        <div class="container">
            <div class="chevron-down block-shadow">&nbsp;</div>
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
            <div class="chevron-down block-shadow">&nbsp;</div>
            <h2>{{ $keys['ProductTitle'] }}</h2>
            @foreach($products AS $product)
                <div class="products">
                    <div class="img"><img src="{{ $product['image_thumb'] }}" class="img-circle" /></div>
                    <div class="description">{{ $product['description'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection