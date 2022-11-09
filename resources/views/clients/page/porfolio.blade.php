@php
    $art_title = explode(',', $data->title);
    $totalPj = 0;
    $totalPr = 0;
@endphp
@extends('clients.layouts.main')
@section('content')
<div id="artistName"  class="name__up d-md-none">{{$data->full_name}}</div>
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
                    <div class="portfolio__info--name px-md-5">
                        <div class="portfolio__info--title">
                            <ul>
                                @foreach($art_title as $tl)
                                    <li>{{$tl}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <span class="portfolio__info--name--01">{{$data->full_name}}</span>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <h3 class="portfolio__info--about px-md-5">ABOUT</h3>
                            <div class="portfolio__info--desc px-md-5">
                                {!!$data->about !!}
                            </div>
                            <h3 class="portfolio__info--about px-md-5">BIOGRAPHY</h3>
                            <div class="portfolio__info--desc p-md-5">
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
                @if(!$products->isEmpty())
                    @php
                        $totalPr = $products->total();
                    @endphp
                    <div class="creative">
                        <h3 class="creative__title">Products</h3>
                        <div class="row" id="productList">
                            @foreach($products as $dt)
                                <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                                    <a href="/sowat-store/{{$dt['slug']}}.html" class="creative__item" >
                                        <div class="creative__item--photo">
                                            <div class="bg" style="background:url({{asset('uploads/'.$dt['cover_mobile'])}}) no-repeat;background-size: cover;"></div>
                                        </div>
                                        <h3 class="creative__item--desc">
                                            {{$dt['title']}}
                                            <span>{{$dt['sub_title']}}</span>
                                        </h3>
                                    </a>
                                </div>
                            @endforeach 
                        </div>
                        @if($totalPr>3)
                            <div class="loadMore"><a href="javascript:void(0);" onclick="loadMore('store', this)" data-page="1">More <img src="{{asset('clients/images/load__more.svg')}}" alt=""></a></div>
                        @endif
                    </div>
                @endif
                @if(!$related->isEmpty())
                    @php 
                        $totalPj = $related->total();
                    @endphp
                    <div class="creative">
                        <h3 class="creative__title">Activities</h3>
                        <div class="row">
                            @foreach($related as $dt)
                                <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                                    <a href="/creative-activities/{{$dt['slug']}}.html" class="creative__item" >
                                        <div class="creative__item--photo">
                                            <div class="bg" style="background:url({{asset('uploads/'.$dt['cover_mobile'])}}) no-repeat;background-size: cover"></div>
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
                        @if($totalPj>3)
                            <div class="loadMore"><a href="javascript:void(0);" onclick="loadMore('creative', this)" data-page="1">More <img src="{{asset('clients/images/load__more.svg')}}" alt=""></a></div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function loadMore(type, e){
            let page = $(e).attr('data-page')
            $.ajax({
                url: '{{route("loadData")}}',
                data: {
                    type: type, 
                    sowater: {{isset($data) ? $data->id:0}},
                    page: ++page,
                    _token: '{{csrf_token()}}'
                },
                type: 'post',
                beforeSend: function(){
                    $('#loading').show();
                },
                success: function(data){
                    $('#loading').hide();
                    $(e).attr('data-page', page)
                    var obj = $(e).parent().prev();
                    if(data){
                        obj.append(data);
                    }
                    if((type == 'creative' && obj.find('>div').length == {{$totalPj}}) || 
                    (type == 'store' && obj.find('>div').length == {{$totalPr}})){
                        $(e).parent().hide()
                    }
                }
            })
        }
    </script>
@endsection