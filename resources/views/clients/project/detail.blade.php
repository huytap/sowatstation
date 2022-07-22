@extends('clients.layouts.main')
@section('content')
<section class="project">
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
                @php
                    $arrSowater = explode(',', $data->sowater_id);
                @endphp
                @if(!empty($arrSowater))
                    <div class="col-sm-12">
                        <div class="sowater" style="display:flex;flex-wrap:wrap;background: {{$data->background}}">
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
                @endif
            @endif
            @if(!empty($gallery))
                <div class="project__content--images">
                    @foreach($gallery as $gl)
                        <img class="img-fluid" src="{{asset('uploads/'.$gl['photo'])}}" alt=""/>
                    @endforeach
                </div>
            @endif
            <a href="{{$data->link_join_us}}" class="btn__join"><img src="{{asset('clients/images/btnJoin.png')}}" alt=""></a>
        </div>
    </div>
    <div class="creative">
        @if(!$related->isEmpty())
        @php 
            $totalPj = $related->total();
        @endphp
            <h3 class="creative__title">Related projects</h3>
            <div class="row">
                @foreach($related as $dt)
                    <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                        <a href="/creative-activities/{{$dt['slug']}}.html" class="creative__item">
                            <div class="creative__item--photo">
                                <div class="bg" style="background:url({{asset('uploads/'.$dt['cover_mobile'])}}) no-repeat;background-size: 100%;"></div>
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
                <div class="loadMore"><a href="javascript:void(0);" onclick="loadMore('creative', this)" data-page="1">More <img src="{{asset('clients/images/load__more.svg')}}" alt=""></a></div>
            @endif
        @endif
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
                if(type == 'creative' && obj.find('>div').length == {{$totalPj}}){
                    $(e).parent().hide()
                }
            }
        })
    }
</script>
@endsection