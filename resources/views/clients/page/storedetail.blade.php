@extends('clients.layouts.main')
@section('content')
<section class="project store">
    <div class="container">
	<img src="{{asset('uploads/'.$data['cover'])}}" class="img-fluid">
	<div class="project__title">
		<h1>{{$data['title']}}</h1>
        <p class="project__title--sub">| {{$data['sub_title']}}</p>
	</div>
	<div class="project__content">
		<div class="row content-m">
			<div class="col-sm-12 text-left">
               {!!$data['description'] !!}
            </div>
            @if($data->sowater_id)
            <div class="col-md-12">
                <div class="sowater" style="background: {{$data->background}}">
                    <h3>{{$data->sowater->full_name}}</h3>
                    <div class="avatar" style="background: url({{asset('uploads/'.$data->sowater->avatar)}}) no-repeat center -10px;background-size: 150%;">
                    </div>
                    <ul>
                        <li><span>Title:</span> {{$data->sowater->title}} </li>
                        <li><span>About:</span> {!!strip_tags($data->sowater->about)!!}</li>
                    </ul>
                </div>
            </div>
            @endif
            @if(!empty($gallery))
            <div class="project__content--images">
                @foreach($gallery as $gl)
                    <img class="img-fluid" src="{{asset('uploads/'.$gl['photo'])}}" alt=""/>
                @endforeach
            </div>
            @endif
            <a href="{{$data->link_order}}" class="btn__join"><img src="{{asset('clients/images/btnOrder.png')}}" alt=""></a>
        </div>
    </div>
    @if(!empty($related))
    <div class="creative">
        <h3 class="creative__title">Related products</h3>
        <div class="row">
            @foreach($related as $dt)
                <div class="col-lg-4 col-md-6 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                    <a href="/sowat-store/{{$dt['slug']}}.html" class="creative__item">
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
    @endif
 </section>
 @endsection