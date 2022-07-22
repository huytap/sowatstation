@extends('clients.layouts.main')
@section('content')
<div class="sowater creative__activities">
    <div class="container">
        <h1 class="title">
            <div class="icon">
                <img src="{{asset('clients/images/round.png')}}" alt="">
            </div>
            CREATIVE <span class="h1__line"></span><br/><span>ACTIVITIES</span>
        </h1>
    </div>
</div>
@if(!empty($data))
<section class="creative">
    <div class="container">
        <div class="row">
            @foreach($data as $dt)
                <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                    <a href="/creative-activities/{{$dt['slug']}}.html" class="creative__item" >
                        <div class="creative__item--photo">
                            <div class="bg" style="background:url({{asset('uploads/'.$dt['cover_mobile'])}}) no-repeat;background-size: 100%;"></div>
                        </div>
                        <h3 class="creative__item--desc">
                            {{$dt['title']}}
                            <span>{{$dt['sub_title']}}</span>
                        </h3>
                        {{-- <div class="creative__item--detail">
                            <div>
                                <div class="icon">
                                    <img src="{{asset('clients/images/arrow-down-4.png')}}" alt="">
                                </div>
                                <h3 class="creative__item--detail__title">{{$dt['title']}}</h3>
                                <p>{{$dt['sub_title']}}.</p>
                            </div>
                        </div> --}}
                    </a>
                </div>   
            @endforeach 
        </div>
    </div>
</section>
@endif
@endsection