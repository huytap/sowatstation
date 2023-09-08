@extends('clients.layouts.main2')
@section('css')
<link rel="stylesheet" href="{{asset('clients/css/lightcase.css')}}">
<style>
    .wrapper{
        background: #000;
    }
</style>
@endsection
@section('content')
    <div class="event">
        <div class="container">
            <div class="event__date wow fadeInUp" data-wow-duration="1.5s">
                {{$data->date}}
                <div class="event__date--01">01</div>
            </div>
            <h3 class="event__title wow fadeInUp" data-wow-duration="1.5s">{{$data->title}}</h3>
            @if($data->sub_title)
                <div class="event__subtitle wow fadeInUp" data-wow-duration="1.5s">{{$data->sub_title}}</div>
            @else
            <div class="event__subtitle wow fadeInUp" data-wow-duration="1.5s">WORKSHOP</div>
            @endif
            <div class="event__location wow fadeInUp" data-wow-duration="1.5s">
                <div class="row">
                    <div class="col-md-5 event__location--01">{{$data->location}}</div>
                    <div class="col-md-7 event__location--02">{{$data->address}}</div>
                </div>
            </div>
        </div>
        <div class="event__photo">
            <div class="container">
                <div class="event__photo--cover wow fadeInUp" data-wow-duration="1.5s">
                    <img src="{{asset('uploads/'.$data->cover)}}" alt="{{$data->title}}" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
    <div class="artists">
        <div class="container">
            @if(!empty($artist))
            <div class="artists__icons wow fadeInUp" data-wow-duration="1.5s">
                <img src="{{asset('clients/images/event-icon-arrow.png')}}" alt="" class="img_arrow">
                <img src="{{asset('clients/images/event-icon-wave.png')}}" alt="" class="img_wave">
                <img src="{{asset('clients/images/sowater-round.png')}}" alt="" class="img_round">
            </div>
            <div class="row artists__row">
                <div class="col-md-5">
                    <h3 class="artists__name wow fadeInUp" data-wow-duration="1.5s">
                        @php
                            $name = explode(' ', $artist->full_name);
                            $newName = '';

                            $i=0;
                            foreach($name as $n){
                                $newName .= '<span>'.$n;
                                if($i==(count($name)-1))
                                    $newName .= '.';
                                $newName .= '</span>';
                                $i++;
                            }
                        @endphp
                        {!! $newName !!}
                    </h3>
                    <div class="artists__title wow fadeInUp" data-wow-duration="1.5s">{{$artist->title}}</div>
                </div>
                <div class="col-md-6 offset-md-1">
                    <div class="artists__avatar artist__avatar wow fadeInUp" data-wow-duration="1.5s">
                        <div class="artist__avatar--img">
                            <img class="img-fluid" src="{{asset('uploads/'.$artist->avatar)}}" alt="{{$artist->full_name}}">
                        </div>
                        <div class="artist__avatar--active">
                            <img src="{{asset('uploads/'.$artist->avatar_hover)}}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row_workat wow fadeInUp" data-wow-duration="1.5s">
                <div class="col-md-5">
                    <div class="artists__workat">WORK AT<br/>{!! str_replace("\n", "<br/>", $artist->work_at) !!}</div>
                </div>
                <div class="col-md-6 offset-md-1">
                    <div class="artists__desc">{!! $data->description !!}</div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @if(!empty($gallery))
    <div class="gallery">
        <div class="container">
            <div class="row gallery__title wow fadeInUp" data-wow-duration="1.5s">
                <div class="col-6 gallery__title--01">02</div>
                <div class="col-6 gallery__title--02">Gallery</div>
            </div>
            <div class="row gallery__list">
                @foreach($gallery as $gl)
                    <div class="col-md-4 wow fadeInUp">
                        <a data-wow-duration="1.5s" href="{{asset('uploads/'.$gl->photo)}}" data-rel="lightcase:myCollection" title="Event Gallery">
                            <div class="gallery__list--item" style="background: url({{asset('uploads/'.$gl->photo)}}) no-repeat center center;background-size:cover;"></div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="gallery__pagination wow fadeInUp" data-wow-duration="1.5s">
                <span class="gallery__pagination--left"><img src="{{asset('clients/images/arrow-left.png')}}" class="img-fluid"></span>
                <span class="gallery__pagination--right"><img src="{{asset('clients/images/arrow-right.png')}}" class="img-fluid"></span>
            </div>
            {{-- {!! $gallery->links() !!} --}}
        </div>
    </div>
    @endif
    @if(!empty($related))
    <div class="related">
        <div class="container">
            <h3 class="related__title wow fadeInUp" data-wow-duration="1.5s">Related events</h3>
            @foreach($related as $dt)
            <a class="row related__item wow fadeInUp" data-wow-duration="1.5s" href="{{$dt->slug.'.html' }}">
                <div class="col-md-6">
                    <div class="related__img">
                        <div style="background:url({{asset('uploads/'.$dt->cover)}}) no-repeat center center;background-size:cover;"></div>
                        {{-- <img src="{{asset('uploads/'.$dt->cover)}}" alt="" class="img-fluid"> --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="related__info">
                        <h3 class="related__info--01">{{$dt->title}} <span>{{$dt->sub_title}}</span></h3>
                        <div class="related__info--02">
                            {{$dt->short_desc}}
                        </div>
                    </div>
                    <span class="related__item--detail detail">
                        <img src="{{asset('clients/images/viewdetail-icon.png')}}" alt="">
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif
@endsection
@section('script')
    <script src="{{asset('clients/js/lightcase.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $("a[data-rel^=lightcase]").lightcase({
                swipe: true,
                showTitle: true,
                type: "image"
            });
            $('.page-link').on('click', function(e){
                alert(0)
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                if(page){
                    $.ajax({
                        url: 'event/{{$data->slug}}.html?page='+page,
                        type: 'post',
                        data: 'html',
                        before: function(){

                        },
                        success: function(data){
                            $(".gallery__list").html(data)
                        }
                    })
                }
            })
        })
    </script>
@endsection