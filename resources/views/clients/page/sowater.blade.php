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
        <h1 class="title">ABOUT <span class="d-md-none">U</span><img class="d-md-none" src="{{asset('clients/images/s.png')}}" alt=""><span class="h1__line"></span><br/><span class="d-none d-md-inline">U</span><img class="d-none d-md-inline" src="{{asset('clients/images/s.png')}}" alt=""></h1>
        <div class="sowater__description">
            <div class="sowater__description--right">
            {!!Setting::getValue('about_desc')!!}    
            </div>  
            <div class="sowater__description--left">
                {!!Setting::getValue('about_desc_2')!!}
            </div>          
        </div>
        <div class="arrow-line d-none d-md-block">
            <img src="{{asset('clients/images/arrow-down-3.png')}}" alt="" class="img-fluid">
        </div>
    </div>
</div>
<div class="artist list">
    <div class="container">
        <div class="row">
            @if(!empty($collection))
                @foreach($collection as $col)
                <div class="col-md-4 col-6">
                    <a href="/portfolio/{{$col->slug}}.html" class="artist__avatar wow fadeInUp" data-wow-duration="1.5s">
                        <div class="artist__avatar--img"><img src="{{asset('uploads/'.$col->avatar)}}" class="img-fluid"></div>
                        <div class="artist__avatar--active">
                            <img src="{{asset('uploads/'.$col->avatar_hover)}}" class="img-fluid">
                            <div class="artist__avatar--info">
                                {{$col->full_name}}
                            </div>
                        </div>
                        <div class="artist__avatar--bg" style="background:{{$col->background}}"></div>
                    </a>
                </div>
                @endforeach
            @endif
            {{-- @if(!empty($collection2))
                    @foreach($collection2 as $col)
                    <div class="col-md-4 col-6">
                        <a href="/portfolio/{{$col->slug}}.html" class="artist__avatar wow fadeInUp" data-wow-duration="1.5s">
                            <div class="artist__avatar--img"><img src="{{asset('uploads/'.$col->avatar)}}" class="img-fluid"></div>
                            <div class="artist__avatar--active">
                                <img src="{{asset('uploads/'.$col->avatar_hover)}}" class="img-fluid">
                                <div class="artist__avatar--info">
                                    {{$col->full_name}}
                                    <span>Associate Creative Director</span>
                                </div>
                            </div>
                            <div class="artist__avatar--bg" style="background:{{$col->background}}"></div>
                        </a>
                    </div>
                    @endforeach
            @endif
            @if(!empty($collection3))
                    @foreach($collection3 as $col)
                    <div class="col-md-4 col-6">
                        <a href="/portfolio/{{$col->slug}}.html" class="artist__avatar wow fadeInUp" data-wow-duration="1.5s">
                            <div class="artist__avatar--img"><img src="{{asset('uploads/'.$col->avatar)}}" class="img-fluid"></div>
                            <div class="artist__avatar--active">
                                <img src="{{asset('uploads/'.$col->avatar_hover)}}" class="img-fluid">
                                <div class="artist__avatar--info">
                                    {{$col->full_name}}
                                </div>
                            </div>
                            <div class="artist__avatar--bg" style="background:{{$col->background}}"></div>
                        </a>
                    </div>
                    @endforeach
            @endif --}}
        </div>
    </div>
</div>
@endsection
