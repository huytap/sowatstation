@php
    $art_title = explode(',', $data->title);
@endphp
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
    <div class="porfolio">
        <div class="container">
            <div class="porfolio__number">
                <div class="porfolio__number--01">01</div>
            </div>
            <h3 class="porfolio__title">ARTIST<span>PORFOLIO</span></h3>
        </div>
        <div class="section">
            <div class="container">
                <div class="porfolio__info">
                    <div class="porfolio__info--title">
                        <ul>
                            @foreach($art_title as $title)
                                <li><img src="{{asset('clients/images/el__li.png')}}" alt="">{{$title}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="porfolio__info--name px-5">
                        <span class="porfolio__info--name--01">{{$data->name}}</span>
                        <span class="porfolio__info--name--02"><img src="{{asset('clients/images/art__icon.png')}}" alt=""></span>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <h3 class="porfolio__info--empty"></h3>
                            <h3 class="porfolio__info--about px-5">ABOUT</h3>
                            <div class="porfolio__info--desc px-5">
                                At Sowat Station, each Sowat—ers carries on their own hunt for original ideas, for ingenious execution.
                            </div>
                            <h3 class="porfolio__info--about px-5">BIOGRAPHY</h3>
                            <div class="porfolio__info--desc p-5">
                                At Sowat Station, each Sowat—ers carries on their own hunt for original ideas, for ingenious execution, and for their own growth. We set out to chart the uncharted territories of this industry, in a hunt that’s always on.
                                <ul>
                                    <li>
                                        2021 Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </li>
                                    <li>
                                        2020 Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </li>
                                    <li>
                                        2019 Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </li>
                                    <li>
                                        2018 Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </li>
                                    <li>
                                        2017 Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-1">
                            <div class="artist__avatar wow fadeInUp" data-wow-duration="1.5s">
                                <div class="artist__avatar--img"><img src="{{asset('uploads/'.$data->avatar)}}" class="img-fluid"></div>
                                <div class="artist__avatar--active">
                                    <img src="{{asset('uploads/'.$data->avatar_hover)}}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gallery gallery__porfolio">
        <div class="container">
            <div class="row gallery__title">
                <div class="col-6 gallery__title--01">02</div>
                <div class="col-6 gallery__title--02">Activities</div>
            </div>
            <div class="list">
                <div class="row gallery__list">
                    <div class="col-11 offset-md-1">
                        <h4 class="gallery__list--title">Event</h4>
                    </div>
                    @foreach($event as $e)
                        <a href="/event/{{$e->slug}}.html" class="col-md-5 offset-md-1">
                            <div class="gallery__list--image" style="background: url({{asset('uploads/'.$e->cover)}}) no-repeat center;background-size:cover;"></div>
                            <h3 class="gallery__list--ititle">{{$e->title}} {{$e->sub_title??'WORKSHOP'}}</h3>
                            <div class="gallery__list--desc">{{$e->short_desc}}</div>
                        </a>
                    @endforeach
                </div>
                <div class="gallery__pagination">
                    <span class="gallery__pagination--left"><img src="{{asset('clients/images/arrow-left.png')}}" class="img-fluid"></span>
                    <span class="gallery__pagination--right"><img src="{{asset('clients/images/arrow-right.png')}}" class="img-fluid"></span>
                </div>

                <div class="row gallery__list">
                    <div class="col-11 offset-md-1">
                        <h4 class="gallery__list--title ">Product</h4>
                    </div>
                    @foreach($event as $e)
                        <div class="col-md-4">
                            <div class="gallery__list--img" style="background:url({{asset('uploads/'.$e->cover)}}) no-repeat center center;background-size:cover;"></div>
                        </div>
                    @endforeach
                </div>
                <div class="gallery__pagination mt-3 mb-5">
                    <span class="gallery__pagination--left"><img src="{{asset('clients/images/arrow-left.png')}}" class="img-fluid"></span>
                    <span class="gallery__pagination--right"><img src="{{asset('clients/images/arrow-right.png')}}" class="img-fluid"></span>
                </div>

                <div class="row gallery__list">
                    <div class="col-11 offset-md-1">
                        <h4 class="gallery__list--title">Article</h4>
                    </div>
                </div>
                @foreach($event as $e)
                    <a href="#" class="row gallery__article mb-5 d-md-flex align-items-end">
                        <div class="col-md-4 offset-md-1">
                            <div class="gallery__list--aimage" style="background: url({{asset('uploads/'.$e->cover)}}) no-repeat center;background-size:cover;"></div>
                        </div>
                        <div class="col-md-4">
                            <h3>Lorem Ipsum</h3>
                            <div class="gallery__list--desc">
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <span class="btn btn-find">Find out more</span> <span><img src="{{asset('clients/images/find__more.png')}}" alt=""></span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="gallery gallery__porfolio">
        <div class="container">
            <div class="row gallery__title">
                <div class="col-6 gallery__title--01">03</div>
                <div class="col-6 gallery__title--02">Gallery</div>
            </div>
            <div class="row gallery__list">
                @foreach($event as $e)
                    <div class="col-md-4">
                        <a data-wow-duration="1.5s" href="{{asset('uploads/'.$e->cover)}}" data-rel="lightcase:myCollection" title="Gallery">
                            <div class="gallery__porfolio--item" style="background: url({{asset('uploads/'.$e->cover)}}) no-repeat center center;background-size:cover;"></div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="gallery__pagination">
                <span class="gallery__pagination--left"><img src="{{asset('clients/images/arrow-left.png')}}" class="img-fluid"></span>
                <span class="gallery__pagination--right"><img src="{{asset('clients/images/arrow-right.png')}}" class="img-fluid"></span>
            </div>
        </div>
    </div>
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
        
            var container = $('.section').find('.container').width();
            var section = $('.section').width();
            var innerW = (section-container)/2;
            $('head').append("<style>.section::after{ max-width:"+(container+innerW)+"px;}</style>");
        });
        var eWidth = $('.gallery__list--image').width();
        var aWidth = $('.gallery__list--aimage').width();
        var gWidth = $('.gallery__porfolio--item')
        $('.gallery__list--image').css('height', setWH(475, 235, eWidth))
        $('.gallery__list--aimage').css('height', setWH(385, 195, aWidth))
        $('.gallery__porfolio--item').css('height', setWH(350,295, gWidth));
        function setWH(w, h, nW){
            var newH = nW*h/w;
            return newH;
        }
    </script>
@endsection