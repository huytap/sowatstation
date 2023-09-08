@extends('clients.layouts.main')
@section('content')
<section class="project store">
    <img src="{{asset('uploads/'.$data['cover_mobile'])}}" class="img-fluid d-md-none">
    <div class="container">
        <img src="{{asset('uploads/'.$data['cover'])}}" class="img-fluid d-none d-md-block">
        <div class="project__title">
            <h1>{{$data['title']}}</h1>
            <p class="project__title--sub">| {{$data['sub_title']}}</p>
        </div>
        <div class="project__content">
            <div class="row content-m">
                <div class="col-sm-12 text-left">
                    <div class="project__content--desc">
                        {!!$data['description'] !!}
                    </div>               
                </div>
            </div>
        </div>
    </div>
    @if($data->sowater_id)
        @php
            $arrSowater = explode(',', $data->sowater_id);
        @endphp
        @if(!empty($arrSowater))
            <div class="container">
                <div class="project__sowater" style="background: {{$data->background}}">
                    <div class="sowater" id="sowater">
                        @foreach($arrSowater as $sw)
                        @php
                            $info = \App\Models\Sowater::getInfo($sw);
                        @endphp
                        <a style="flex:1 0 {{100/count($arrSowater)}}%" class="artist__portfolio" href="/portfolio/{{$info['slug']}}.html">
                            <div class="avatar" style="background: url({{asset('uploads/'. $info->avatar)}}) no-repeat center -10px;background-size: 150%;">
                            </div>
                            <ul>
                                <li><span>Owner:</span> {{$info->full_name}}</li>
                                <li><span>Title:</span> {{$info->title}} </li>
                                <li><span>About:</span> {!!strip_tags($info->about)!!}</li>
                            </ul>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    @endif
    <div class="container">
        <div class="project__content">
            <div class="project__content--images">
                @if(!empty($gallery))
                    @foreach($gallery as $gl)
                        <img class="img-fluid" src="{{asset('uploads/'.$gl['photo'])}}" alt=""/>
                    @endforeach
                @endif
                {!!$data->photos !!}
                <a href="{{$data->link_order}}" class="btn__join"><img src="{{asset('clients/images/btnOrder.png')}}" alt=""></a>
            </div>    
        </div>
        <div class="creative">
            @if(!$related->isEmpty())
            @php 
                $totalPj = $related->total();
            @endphp
                <h3 class="creative__title">Related products</h3>
                <div class="row">
                    @foreach($related as $dt)
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp filter digital-design social  animated" style="visibility: visible; animation-name: fadeInUp;">
                            <a href="/sowat-store/{{$dt['slug']}}.html" class="creative__item">
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
                @if($totalPj>3)
                    <div class="loadMore"><a href="javascript:void(0);" onclick="loadMore('store', this)" data-page="1">More <img src="{{asset('clients/images/load__more.svg')}}" alt=""></a></div>
                @endif  
            @endif
        </div>
    </div>
 </section>
 @endsection
 @section('script')
<script>
    function loadMore(type, e){
        let page = $(e).attr('data-page')
        $.ajax({
            url: '{{route("loadData")}}',
            data: {
                type: type, 
                related: 1, 
                id: {{$data->id}},
                sowater: '{{isset($data) ? $data->sowater_id:0}}',
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
                if(type == 'store' && obj.find('>div').length == {{isset($totalPj) ?$totalPj : 0}}){
                    $(e).parent().hide()
                }
            }
        })
    }
</script>
<script type="text/javascript" src="{{asset('clients/js/bxslider.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        if($(window).width() < 769){
            $('#sowater').bxSlider({
                mode: 'fade',
                captions: false,
                touchEnabled: true,
                controls: false,
                auto: true
            });
        }
    });
</script>
@endsection