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
$arrBg = [
    '#c23200',
    '#2e009e',
    '#a91462',
    '#f50099',
    '#f9b304',
    '#349dad',
    '#2e009e',
    '#2c9405',
    '#bd0001'
];
@endphp
@extends('clients.layouts.main')
@section('css')
<style>
    .list .row .col-md-4:first-child .artist__avatar:first-child::after{
        background: {{$arrBg[0]}};
    }
    .list .row .col-md-4:first-child .artist__avatar:nth-child(2):after{
        background: {{$arrBg[1]}};
    }
    .list .row .col-md-4:first-child .artist__avatar:last-child:after{
        background: {{$arrBg[2]}};
    }
    .list .row .col-md-4:nth-child(2) .artist__avatar:first-child::after{
        background: {{$arrBg[3]}};
    }
    .list .row .col-md-4:nth-child(2) .artist__avatar:nth-child(2):after{
        background: {{$arrBg[4]}};
    }
    .list .row .col-md-4:nth-child(2) .artist__avatar:last-child:after{
        background: {{$arrBg[5]}};
    }
    .list .row .col-md-4:last-child .artist__avatar:first-child:after{
        background: {{$arrBg[6]}};
    }
    .list .row .col-md-4:last-child .artist__avatar:nth-child(2):after,
    .list .row .col-md-4:last-child .artist__avatar:last-child:after{
        background: {{$arrBg[8]}};
    }
</style>
@endsection
@section('content')
<div class="sowater">
    <div class="container">
        <h1 class="title">ABOUT <span class="h1__line"></span><br/>U<img src="{{asset('clients/images/s.png')}}" alt=""></h1>
        <div class="sowater__description">
            <div class="sowater__description--right">
                <p>The Hunter Group has been established for 15 years since 2007 in Vietnam as a local creative agency, making a tireless effort to find out the best communication solutions through our creativity.</p>
                <p>Descended from that spirit, SoWat Station is also a The Hunter Group's member with a solid foundation. We showed up with the mission of connecting the artist community and elevating the art industry in Vietnam to new heights.</p>
            </div>  
            <div class="sowater__description--left">
                <ul>
                    <li>- DIVERSE RESOURCES</li>
                    <li>- WIDE NETWORK</li>
                    <li>- ABILITY TO COORDINATE</li>
                    <li>- PUT THE HEART ON DETAILS</li>
                </ul>
                {{-- <div class="sowater__description--icon wow fadeInUp" data-wow-duration="1.5s">
                    <img src="{{asset('clients/images/event.png')}}" alt="" class="img-fluid">
                </div> --}}
                {{-- <div class="sowater__description--text wow fadeInUp" data-wow-duration="1.5s">{!! Setting::getValue('sowater_description') !!}</div> --}}
            </div>          
        </div>
        <div class="arrow-line">
            <img src="{{asset('clients/images/arrow-down-3.png')}}" alt="" class="img-fluid">
        </div>
    </div>
</div>
<div class="artist list">
    <div class="container">
        <div class="row">
            @if(!empty($collection1))
            <div class="col-md-4">
                {{-- <div class="artist__square wow fadeInUp" data-wow-duration="1.5s"><img src="{{asset('clients/images/sowater-square.png')}}" alt=""></div> --}}
                @foreach($collection1 as $col)
                    <a href="/portfolio/{{$col->slug}}.html" class="artist__avatar wow fadeInUp" data-wow-duration="1.5s">
                        <div class="artist__avatar--img"><img src="{{asset('uploads/'.$col->avatar)}}" class="img-fluid"></div>
                        <div class="artist__avatar--active">
                            <img src="{{asset('uploads/'.$col->avatar_hover)}}" class="img-fluid">
                            <div class="artist__avatar--info">
                                {{$col->full_name}}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            @endif
            @if(!empty($collection2))
                <div class="col-md-4">
                    @foreach($collection2 as $col)
                        <a href="/portfolio/{{$col->slug}}.html" class="artist__avatar wow fadeInUp" data-wow-duration="1.5s">
                            <div class="artist__avatar--img"><img src="{{asset('uploads/'.$col->avatar)}}" class="img-fluid"></div>
                            <div class="artist__avatar--active">
                                <img src="{{asset('uploads/'.$col->avatar_hover)}}" class="img-fluid">
                                <div class="artist__avatar--info">
                                    {{$col->full_name}}
                                    <span>Associate Creative Director</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    {{-- <div class="artist__icon wow fadeInUp" data-wow-duration="1.5s"><img src="{{asset('clients/images/sowater-box.png')}}" alt=""></div> --}}
                </div>
            @endif
            @if(!empty($collection3))
                <div class="col-md-4">
                    @foreach($collection3 as $col)
                        <a href="/portfolio/{{$col->slug}}.html" class="artist__avatar wow fadeInUp" data-wow-duration="1.5s">
                            <div class="artist__avatar--img"><img src="{{asset('uploads/'.$col->avatar)}}" class="img-fluid"></div>
                            <div class="artist__avatar--active">
                                <img src="{{asset('uploads/'.$col->avatar_hover)}}" class="img-fluid">
                                <div class="artist__avatar--info">
                                    {{$col->full_name}}
                                </div>
                            </div>
                        </a>
                    @endforeach
                    {{-- <div class="artist__icon wow fadeInUp" data-wow-duration="1.5s"><img src="{{asset('clients/images/event.png')}}" alt=""></div>
                    <div class="artist__round wow fadeInUp" data-wow-duration="1.5s"><img src="{{asset('clients/images/sowater-round.png')}}" alt=""></div> --}}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
