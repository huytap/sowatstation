@php
use App\Models\Setting;
$collection1 = $collection->filter(function($val, $key){
    return $val->on_column==1;
});
$collection2 = $collection->filter(function($val, $key){
    return $val->on_column==2;
});
$collection3 = $collection->filter(function($val, $key){
    return $val->on_column==3;
});
@endphp
@extends('clients.layouts.main')
@section('content')
<div class="sowater">
    <div class="container">
        <h1 class="title wow fadeInUp" data-wow-duration="1.5s">SOWAT—ER <img src="{{asset('clients/images/s.png')}}" alt=""></h1>
        <div class="sowater__description">
            <div class="sowater__description--line wow fadeInLeft" data-wow-duration="1.5s"></div>
            <div class="row">
                <div class="col-6">
                    <div class="sowater__description--icon wow fadeInUp" data-wow-duration="1.5s">
                        <img src="{{asset('clients/images/event.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="sowater__description--text wow fadeInUp" data-wow-duration="1.5s">{!! Setting::getValue('sowater_description') !!}</div>
                </div>
                <div class="col-6">
                    <div class="sowater__description--arrow wow fadeInUp" data-wow-duration="1s">
                        <img src="{{asset('clients/images/arrow-sowater.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="sowater__description--eye wow fadeInUp" data-wow-duration="1.5s">
                        <img src="{{asset('clients/images/eye.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
<div class="artist list">
    <div class="container">
        <div class="row">
            @if(!empty($collection1))
            <div class="col-md-4">
                <div class="artist__square wow fadeInUp" data-wow-duration="1.5s"><img src="{{asset('clients/images/sowater-square.png')}}" alt=""></div>
                @foreach($collection1 as $col)
                    <div class="artist__avatar wow fadeInUp" data-wow-duration="1.5s">
                        <div class="artist__avatar--img"><img src="{{asset('uploads/'.$col->avatar)}}" class="img-fluid"></div>
                        <div class="artist__avatar--active">
                            <img src="{{asset('uploads/'.$col->avatar_hover)}}" class="img-fluid">
                            <div class="artist__avatar--info">
                                {{$col->full_name}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
            @if(!empty($collection2))
                <div class="col-md-4">
                    @foreach($collection2 as $col)
                        <div class="artist__avatar wow fadeInUp" data-wow-duration="1.5s">
                            <div class="artist__avatar--img"><img src="{{asset('uploads/'.$col->avatar)}}" class="img-fluid"></div>
                            <div class="artist__avatar--active">
                                <img src="{{asset('uploads/'.$col->avatar_hover)}}" class="img-fluid">
                                <div class="artist__avatar--info">
                                    {{$col->full_name}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="artist__icon wow fadeInUp" data-wow-duration="1.5s"><img src="{{asset('clients/images/sowater-box.png')}}" alt=""></div>
                </div>
            @endif
            @if(!empty($collection3))
                <div class="col-md-4">
                    @foreach($collection3 as $col)
                        <div class="artist__avatar wow fadeInUp" data-wow-duration="1.5s">
                            <div class="artist__avatar--img"><img src="{{asset('uploads/'.$col->avatar)}}" class="img-fluid"></div>
                            <div class="artist__avatar--active">
                                <img src="{{asset('uploads/'.$col->avatar_hover)}}" class="img-fluid">
                                <div class="artist__avatar--info">
                                    {{$col->full_name}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="artist__icon wow fadeInUp" data-wow-duration="1.5s"><img src="{{asset('clients/images/event.png')}}" alt=""></div>
                    <div class="artist__round wow fadeInUp" data-wow-duration="1.5s"><img src="{{asset('clients/images/sowater-round.png')}}" alt=""></div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
