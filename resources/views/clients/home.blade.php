@php
use App\Models\Setting;    
@endphp
@extends('clients.layouts.main')
@section('content')
<div class="banner events">
    <ul id="bannerSlide">
        @foreach($events as $key => $event)
            <li>
                <img src="{{asset('clients/images/home-slide1.jpg')}}" alt="" class="img-fluid"/>
            </li>
        @endforeach
    </ul>
</div>
<div class="services">
    <div class="container">
        <div class="services__title wow fadeInUp" data-wow-duration="1.5s">
            <img src="{{asset('clients/images/text__our-service.png')}}" alt="" class="img-fluid">
        </div>
        <div class="services__list">
            <div class="services__list--item wow fadeInUp" data-wow-duration="1.5s">
                <div class="col services__list--item__left">
                    <div class="services__list--item__cover">
                        <img src="{{asset('clients/images/cover__our-service.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col services__list--item__right">
                    <div class="services__list--item__content">
                        <div class="row">
                            <div class="col-md-3 services__list--item__content--title">
                                <img src="{{asset('clients/images/cover__our-service_content.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-9">
                                <div class="services__list--item__hub">
                                    <div class="services__list--item__title">
                                        <img src="{{asset('clients/images/text__our-service-hub.png')}}" alt="" class="img-fluid">
                                    </div>
                                    <ul class="services__list--item__list">
                                        <li>
                                            For those who love art and who need art
                                        </li>
                                        <li>
                                            For artists - established artist and maiden artist                                        
                                        </li>
                                        <li>
                                            With #Artspeak #Artjoy #Artlocal #Artinnovate
                                        </li>
                                        <li>
                                            Plan and Organize events and workshops
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="services__list--item wow fadeInUp" data-wow-duration="1.5s">
                <div class="services__list--item__contentpr">
                    <div class="row">
                        <div class="col services__list--item__right">
                            <div class="services__list--item__titlepr">
                                <img src="{{asset('clients/images/text__our-service-production.png')}}" alt="" class="img-fluid">
                            </div>
                            <ul class="services__list--item__list">
                                <li>
                                    Integrated Marketing Communications campaign support items
                                </li>
                                <li>
                                    Non marketing items
                                </li>
                                <li>
                                    Customized and personalized unique items
                                </li>
                            </ul>
                        </div>
                        <div class="col services__list--item__left">
                            <div class="services__list--item__cover">
                                <img src="{{asset('clients/images/cover__our-service-production.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('clients/js/bxslider.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#bannerSlide').bxSlider({
            mode: 'fade',
            captions: false,
            touchEnabled: false,
            controls: false
        });
    });
</script>
@endsection