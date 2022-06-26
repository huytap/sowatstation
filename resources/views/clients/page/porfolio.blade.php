@php
    $art_title = explode(',', $data->title);
@endphp
@extends('clients.layouts.main')
@section('content')
<div class="sowater creative__activities portfolio__head">
    <div class="container">
        <h1 class="title">
            <div class="icon">
                <img src="{{asset('clients/images/round.png')}}" alt="">
            </div>
            ARTIST<br/>PORTFOLIO
        </h1>
    </div>
</div>
    <div class="portfolio">
        <div class="section">
            <div class="container">
                <div class="portfolio__info">
                    <div class="portfolio__info--name px-5">
                        <div class="portfolio__info--title">
                            <ul>
                                @foreach($art_title as $title)
                                    <li>{{$title}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <span class="portfolio__info--name--01">{{$data->name}}</span>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <h3 class="portfolio__info--about px-5">ABOUT</h3>
                            <div class="portfolio__info--desc px-5">
                                {!!$data->about !!}
                            </div>
                            <h3 class="portfolio__info--about px-5">BIOGRAPHY</h3>
                            <div class="portfolio__info--desc p-5">
                                {!!$data->biography!!}
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="artist__avatar wow fadeInUp" data-wow-duration="1.5s">
                                <div class="artist__avatar--img">
                                    <img src="{{asset('uploads/'.$data->avatar)}}" alt="" class="img-fluid">
                                </div>
                                <div class="artist__avatar--active">
                                    <img src="{{asset('uploads/'.$data->avatar_hover)}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!empty($related))
                <div class="creative">
                    <h3 class="creative__title">Activities</h3>
                    <div class="row">
                        @foreach($related as $dt)
                            <div class="col-lg-4 col-md-6 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                                <a href="/creative-activities/{{$dt['slug']}}.html" class="creative__item">
                                    <img src="{{asset('uploads/'.$dt['cover_mobile'])}}" alt="" class="img-fluid">
                                    <span class="creative__item--desc">
                                        {{$dt['sub_title']}}
                                    </span>
                                    <div class="creative__item--detail">
                                        <div>
                                            <div class="icon">
                                                <img src="{{asset('clients/images/arrow-down-4.png')}}" alt="">
                                            </div>
                                            <h3 class="creative__item--detail__title">{{$dt['title']}}</h3>
                                            <p>{{$dt['sub_title']}}.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>   
                        @endforeach 
                        {{-- <div class="col-lg-4 col-md-6 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                            <a href="{{route('creativedetail')}}" class="creative__item">
                                <img src="{{asset('clients/images/creative/item2.jpg')}}" alt="" class="img-fluid">
                                <span class="creative__item--desc">
                                    Lorem ipsum dolor sit amet
                                </span>
                                <div class="creative__item--detail">
                                    <div>
                                        <div class="icon">
                                            <img src="{{asset('clients/images/arrow-down-4.png')}}" alt="">
                                        </div>
                                        <h3 class="creative__item--detail__title">TITTLE ACTIVITY</h3>
                                        <p>Lorem ipsum dolor sit amet.</p>
                                    </div>
                                </div>
                            </a>
                        </div>    
                        <div class="col-lg-4 col-md-6 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                            <a href="{{route('creativedetail')}}" class="creative__item">
                                <img src="{{asset('clients/images/creative/item3.jpg')}}" alt="" class="img-fluid">
                                <span class="creative__item--desc">
                                    Lorem ipsum dolor sit amet
                                </span>
                                <div class="creative__item--detail">
                                    <div>
                                        <div class="icon">
                                            <img src="{{asset('clients/images/arrow-down-4.png')}}" alt="">
                                        </div>
                                        <h3 class="creative__item--detail__title">TITTLE ACTIVITY</h3>
                                        <p>Lorem ipsum dolor sit amet.</p>
                                    </div>
                                </div>
                            </a>
                        </div>     --}}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection