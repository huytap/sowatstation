@php
use App\Models\Setting;    
@endphp
@extends('clients.layouts.main')
@section('content')
<div class="banner events">
    <ul id="bannerSlide">
        @foreach($slides as $key => $slide)
            <li>
                <a href="{{$slide['link_url']}}">
                    <img src="{{asset('uploads/'.$slide['photo'])}}" alt="" class="img-fluid d-none d-lg-block"/>
                    <img src="{{asset('uploads/'.$slide['photo_mobile'])}}" alt="" class="img-fluid d-lg-none d-md-none"/>
                </a>
            </li>
        @endforeach
    </ul>
</div>
<div class="services">
    <div class="container wow fadeInUp" data-wow-duration="1.5s">
        <div class="services__arrowdown wow fadeInUp" data-wow-duration="1.5s">
            <img src="{{asset('clients/images/arrow-down1.png')}}" alt="" class="img-fluid">
        </div>
        <div class="services__arrowdown2 wow fadeInUp" data-wow-duration="1.5s">
            <img src="{{asset('clients/images/arrow-down2.png')}}" alt="" class="img-fluid">
        </div>
        <div class="services__title wow fadeInUp" data-wow-duration="1.5s">
            <img src="{{asset('clients/images/text__our-service.png')}}" alt="" class="img-fluid">
        </div>
        <div class="services__list">
            <div class="services__list--item wow fadeInUp" data-wow-duration="1.5s">
                <div class="col services__list--item__left">
                    <div class="services__list--item__cover">
                        <img src="{{asset('uploads/'.Setting::getImage('art_hub'))}}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col services__list--item__right">
                    <div class="services__list--item__content">
                        <div class="row">
                            <div class="col-md-3 col-3 services__list--item__content--title">
                                <img src="{{asset('clients/images/cover__our-service_content.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-9 col-9">
                                <div class="services__list--item__hub">
                                    <div class="services__list--item__title">
                                        <a href="{{route('creative')}}"><img src="{{asset('clients/images/text__our-service-hub.png')}}" alt="" class="img-fluid"></a>
                                    </div>
                                    <div class="services__list--item__list">
                                        {!!Setting::getValue('art_hub')!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="services__list--item wow fadeInUp" data-wow-duration="1.5s">
                <div class="services__list--item__contentpr">
                    <div class="row">
                        <div class="col artwork services__list--item__right">
                            <div>
                                <div class="services__list--item__titlepr">
                                    <a href="{{route('store')}}"><img src="{{asset('clients/images/text__our-service-production.png')}}" alt="" class="img-fluid"></a>
                                </div>
                                <div class="services__list--item__list">
                                    {!!Setting::getValue('art_work')!!}
                                </div>
                            </div>
                        </div>
                        <div class="col services__list--item__left">
                            <div class="services__list--item__cover">
                                <img src="{{asset('uploads/'.Setting::getImage('art_work'))}}" alt="" class="img-fluid">
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