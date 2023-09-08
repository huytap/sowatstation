@php
use App\Models\Setting;    
@endphp
@extends('clients.layouts.main')
@section('content')
<div class="about">
    <div class="container">
        <div class="row ">
            <div class="col-7 pe-0">
                <div class="about__text wow fadeInUp" data-wow-duration="1.5s">
                    <img id="aboutus" src="{{asset('clients/images/about_bg.png')}}" alt="" class="img-fluid">
                    <img id="aboutus_zoom" class="about__text--hover img-fluid" src="{{asset('clients/images/about-bg_hover.png')}}" alt="">
                </div>
                <div class="about__box">
                    <div class="about__box--rect wow fadeInUp" data-wow-duration="1.5s"><img src="{{asset('clients/images/box.png')}}" alt=""></div>
                    <div class="about__box--arrow wow fadeInUp" data-wow-duration="1.5s"><img src="{{asset('clients/images/arrow.png')}}" alt=""></div>
                </div>
            </div>
            <div class="col-5">
                {{-- <h3 class="wow fadeInUp" data-wow-duration="1.5s">{{Setting::getValue('about_title')}}</h3> --}}
                <div class="about__description wow fadeInUp" data-wow-duration="1.5s">
                    {!! Setting::getValue('about_description') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="production">
    <div class="container">
        <div class="production__box wow fadeInUp" data-wow-duration="1.5s">
            <img src="{{asset('clients/images/box_2.png')}}" alt="" class="img-fluid">
        </div>        
        <h2 class="text-end wow fadeInUp" data-wow-duration="1.5s">ART&<br/>PRODUCTI<img src="{{asset('clients/images/round.png')}}" class="d-inline-block">N</h2>
        <ul class="production__list">
            <li class=" wow fadeInUp" data-wow-duration="1.5s"><a href="#">FEATURE COLLECTION</a></li>
            {{-- <li class=" wow fadeInUp" data-wow-duration="1.5s"><a href="#">SOWAT X ẤT Ơ</a></li> --}}
        </ul>
        <div class="row production__description">
            <div class="col-lg-9 offset-lg-3 text-end">
                {!! Setting::getValue('production_desc') !!}
            </div>
        </div>
    </div>
</div>
<div class="cards">
    <div class="cards__arrow wow fadeInUp" data-wow-duration="1.5s">
        <img src="{{asset('clients/images/arrow3.png')}}" alt="" class="img-fluid">
    </div>
    <div class="container">
        <div class="row">
            {{-- <div class="col-2">
                <p class=" wow fadeInUp" data-wow-duration="1.5s">{!! Setting::getValue('postcard_description') !!}</p>
                <div class="cards__arrow wow fadeInUp" data-wow-duration="1.5s">
                    <img src="{{asset('clients/images/arrow3.png')}}" alt="">
                </div>
            </div> --}}
            @if(!empty($postcards))
                <div class="col-9 offset-md-3 wow fadeInUp" data-wow-duration="1.5s">
                    <ul id="bxslider">
                        @foreach($postcards as $key => $postcard)
                            @if($key%2 == 0)
                                <li>
                                    <div class="row">
                            @endif
                                <div class="col-5 @if($key%2 !== 0) offset-md-2 @endif">
                                    <div class="cards__item">
                                        <a href="#">
                                            <img src="{{asset('uploads/'.$postcard->cover)}}" class="img-fluid" alt="">
                                            <div class="cards__item__name">
                                                POSTCARD
                                                <span><?=$postcard->title?></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @if($key % 2 !== 0 || $key == (count($postcards)-1))
                                    </div>                        
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <div class="cards__slide wow fadeInUp" data-wow-duration="1.5s">
                        <div id="cards__slide--prev" class="cards__slide--prev" role="button" aria-label="Prev slide" aria-disabled="false"></div>
                        <div id="cards__slide--next" class="cards__slide--next" role="button" aria-label="Next slide" aria-disabled="false"></div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@if(!empty($events))
<div class="events">
    <div class="container">
        <div class="events__title">
            <h2>EVENT</h2>
        </div>
        <div class="events__slide row">
            <div class="col-1 wow fadeInUp" data-wow-duration="1.5s">
                <div id="events__slide--prev" class="events__slide--prev" role="button" aria-label="Prev slide" aria-disabled="false"></div>
            </div>
            <div class="col-10 p-0 wow fadeInUp" data-wow-duration="1.5s">
                <ul id="eventSlide">
                    @foreach($events as $key => $event)
                        <li>
                            <img src="{{asset('uploads/'. $event->cover)}}" alt="" class="img-fluid"/>
                            <div class="events__slide--description text-center">
                                {!! $event['description'] !!}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-1 wow fadeInUp" data-wow-duration="1.5s">
                <div id="events__slide--next" class="events__slide--next" role="button" aria-label="Next slide" aria-disabled="false"></div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty($artist))
<div class="artist">
    <div class="container">
        <div class="row">
            <h2 class="col-10 offset-md-1 wow fadeInUp" data-wow-duration="1.5s">FEATURE ARTISTS</h2>
        </div>
        <div class="row">
            @foreach($artist as $art)
                <div class="col-3 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="artist__avatar">
                        <div class="artist__avatar--img">                        
                            <img src="{{asset('uploads/'.$art->avatar)}}" class="img-fluid" alt="">
                        </div>
                        <div class="artist__avatar--active">
                            <img src="{{asset('uploads/'.$art->avatar_hover)}}" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-3 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="artist__info wow fadeInUp" data-wow-duration="1.5s">
                        <div class="artist__info--name">
                            {{$art->full_name}}
                        </div>
                        <div class="artist__info--title">
                            ARTIST
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection

@section('script')
<script type="text/javascript" src="{{asset('clients/js/bxslider.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#bxslider').bxSlider({
            mode: 'fade',
            captions: false,
            touchEnabled: false,
            nextSelector: "#cards__slide--next",
            prevSelector: "#cards__slide--prev",
            nextText: '<img src="clients/images/arrow2.png" class="img-fluid">',
            prevText: '<img src="clients/images/arrow_left.png" class="img-fluid">',
            pager: false
        })

        $('#eventSlide').bxSlider({
            mode: 'fade',
            captions: false,
            touchEnabled: false,
            nextSelector: "#events__slide--next",
            prevSelector: "#events__slide--prev",
            nextText: '<img src="clients/images/arrow2.png" class="img-fluid">',
            prevText: '<img src="clients/images/arrow_left.png" class="img-fluid">',
        });
    });

    function magnify(imgZoomID, zoom) {
        var imgZoom, glass, w, h, bw;
        imgZoom = document.getElementById(imgZoomID);

        /* Create magnifier glass: */
        glass = document.createElement("DIV");
        glass.setAttribute("class", "img-magnifier-glass");

        /* Insert magnifier glass: */
        imgZoom.parentElement.insertBefore(glass, imgZoom);

        /* Set background properties for the magnifier glass: */
        glass.style.backgroundImage = "url('" + imgZoom.src + "')";
        glass.style.backgroundRepeat = "no-repeat";
        glass.style.backgroundSize = (imgZoom.width * zoom) + "px " + (imgZoom.height * zoom) + "px";
        bw = 3;
        w = glass.offsetWidth / 2;
        h = glass.offsetHeight / 2;

        /* Execute a function when someone moves the magnifier glass over the image: */
        glass.addEventListener("mousemove", moveMagnifier);
        imgZoom.addEventListener("mousemove", moveMagnifier);

        /*and also for touch screens:*/
        glass.addEventListener("touchmove", moveMagnifier);
        imgZoom.addEventListener("touchmove", moveMagnifier);

        function moveMagnifier(e) {
            var pos, x, y;
            /* Prevent any other actions that may occur when moving over the image */
            e.preventDefault();
            /* Get the cursor's x and y positions: */
            pos = getCursorPos(e);
            x = pos.x;
            y = pos.y;
            /* Prevent the magnifier glass from being positioned outside the image: */
            if (x > imgZoom.width - (w / zoom)) {x = imgZoom.width - (w / zoom);}
            if (x < w / zoom) {x = w / zoom;}
            if (y > imgZoom.height - (h / zoom)) {y = imgZoom.height - (h / zoom);}
            if (y < h / zoom) {y = h / zoom;}
            /* Set the position of the magnifier glass: */
            glass.style.left = (x - w) + "px";
            glass.style.top = (y - h) + "px";
            /* Display what the magnifier glass "sees": */
            glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
        }

        function getCursorPos(e) {
            var a, x = 0, y = 0;
            e = e || window.event;
            /* Get the x and y positions of the image: */
            a = imgZoom.getBoundingClientRect();
            /* Calculate the cursor's x and y coordinates, relative to the image: */
            x = e.pageX - a.left;
            y = e.pageY - a.top;
            /* Consider any page scrolling: */
            x = x - window.pageXOffset;
            y = y - window.pageYOffset;
            return {x : x, y : y};
        }
    }

    magnify("aboutus_zoom", 1);
</script>
@endsection