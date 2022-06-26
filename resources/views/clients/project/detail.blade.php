@extends('clients.layouts.main')
@section('content')
<section class="project">
    <div class="container">
	<img src="{{asset('uploads/'.$data['cover'])}}" class="img-fluid">
	<div class="project__title">
		<h1>{{$data['title']}}</h1>
	</div>
	<div class="project__content">
		<div class="row content-m">
			<div class="col-sm-12 text-left">
               {!!$data['description'] !!}
            </div>
            <div class="col-md-12">
                <div class="sowater">
                    <h3>{{$data->sowater->full_name}}</h3>
                    <div class="avatar" style="background: url({{asset('uploads/'.$data->sowater->avatar)}}) no-repeat center -10px;background-size: 150%;">
                    </div>
                    <ul>
                        <li><span>Host:</span> {!!$data->sowater->work_at!!}</li>
                        <li><span>Title:</span> {{$data->sowater->title}} </li>
                        <li><span>About:</span> {!!strip_tags($data->sowater->about)!!}</li>
                    </ul>
                </div>
            </div>
            @if(!empty($gallery))
            <div class="project__content--images">
                @foreach($gallery as $gl)
                    <img class="img-fluid" src="{{asset('uploads/'.$gl['photo'])}}" alt=""/>
                @endforeach
            </div>
            @endif
            <a href="#" class="btn__join"><img src="{{asset('clients/images/btnJoin.png')}}" alt=""></a>
        </div>
    </div>
    @if(!empty($related))
    <div class="creative">
        <h3 class="creative__title">Related projects</h3>
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
        </div>
    </div>
    @endif
 </section>
 @endsection