@extends('clients.layouts.main')
@section('content')
<div class="sowater creative__activities store">
    <div class="container">
        <h1 class="title">
            <div class="icon">
                <img src="{{asset('clients/images/round.png')}}" alt="">
            </div>
            SOWAT<br/><span class="store">STORE</span> <span class="h1__line"></span>
        </h1>
    </div>
</div>
@if(!empty($data))
<section class="creative">
    <div class="container">
        <div class="row">
            @foreach($data as $dt)
                <div class="col-lg-4 col-md-6 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                    <a href="/sowat-store/{{$dt['slug']}}.html" class="creative__item">
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
            {{-- <div class="col-lg-4 col-md-6 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                <a href="{{route('creativedetail')}}" class="creative__item">
                    <img src="{{asset('clients/images/creative/item2.jpg')}}" alt="" class="img-fluid">
                    <span class="creative__item--desc">
                        Lorem ipsum dolor sit amet
                    </span>
                    <div class="creative__item--detail">
                        <div>
                            <div class="icon">
                                <img src="{{asset('clients/images/arrow-down-4.png')}}" alt="">
                            </div>
                            <h3 class="creative__item--detail__title">TITTLE ACTIVITY</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </a>
            </div>    
            <div class="col-lg-4 col-md-6 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                <a href="{{route('creativedetail')}}" class="creative__item">
                    <img src="{{asset('clients/images/creative/item3.jpg')}}" alt="" class="img-fluid">
                    <span class="creative__item--desc">
                        Lorem ipsum dolor sit amet
                    </span>
                    <div class="creative__item--detail">
                        <div>
                            <div class="icon">
                                <img src="{{asset('clients/images/arrow-down-4.png')}}" alt="">
                            </div>
                            <h3 class="creative__item--detail__title">TITTLE ACTIVITY</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </a>
            </div>    
            <div class="col-lg-4 col-md-6 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                <a href="{{route('creativedetail')}}" class="creative__item">
                    <img src="{{asset('clients/images/creative/item2.jpg')}}" alt="" class="img-fluid">
                    <span class="creative__item--desc">
                        Lorem ipsum dolor sit amet
                    </span>
                    <div class="creative__item--detail">
                        <div>
                            <div class="icon">
                                <img src="{{asset('clients/images/arrow-down-4.png')}}" alt="">
                            </div>
                            <h3 class="creative__item--detail__title">TITTLE ACTIVITY</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </a>
            </div>    
            <div class="col-lg-4 col-md-6 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                <a href="{{route('creativedetail')}}" class="creative__item">
                    <img src="{{asset('clients/images/creative/item3.jpg')}}" alt="" class="img-fluid">
                    <span class="creative__item--desc">
                        Lorem ipsum dolor sit amet
                    </span>
                    <div class="creative__item--detail">
                        <div>
                            <div class="icon">
                                <img src="{{asset('clients/images/arrow-down-4.png')}}" alt="">
                            </div>
                            <h3 class="creative__item--detail__title">TITTLE ACTIVITY</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </a>
            </div>    
            <div class="col-lg-4 col-md-6 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                <a href="{{route('creativedetail')}}" class="creative__item">
                    <img src="{{asset('clients/images/creative/item1.jpg')}}" alt="" class="img-fluid">
                    <span class="creative__item--desc">
                        Lorem ipsum dolor sit amet
                    </span>
                    <div class="creative__item--detail">
                        <div>
                            <div class="icon">
                                <img src="{{asset('clients/images/arrow-down-4.png')}}" alt="">
                            </div>
                            <h3 class="creative__item--detail__title">TITTLE ACTIVITY</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </a>
            </div>    
            <div class="col-lg-4 col-md-6 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                <a href="{{route('creativedetail')}}" class="creative__item">
                    <img src="{{asset('clients/images/creative/item1.jpg')}}" alt="" class="img-fluid">
                    <span class="creative__item--desc">
                        Lorem ipsum dolor sit amet
                    </span>
                    <div class="creative__item--detail">
                        <div>
                            <div class="icon">
                                <img src="{{asset('clients/images/arrow-down-4.png')}}" alt="">
                            </div>
                            <h3 class="creative__item--detail__title">TITTLE ACTIVITY</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </a>
            </div>    
            <div class="col-lg-4 col-md-6 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                <a href="{{route('creativedetail')}}" class="creative__item">
                    <img src="{{asset('clients/images/creative/item2.jpg')}}" alt="" class="img-fluid">
                    <span class="creative__item--desc">
                        Lorem ipsum dolor sit amet
                    </span>
                    <div class="creative__item--detail">
                        <div>
                            <div class="icon">
                                <img src="{{asset('clients/images/arrow-down-4.png')}}" alt="">
                            </div>
                            <h3 class="creative__item--detail__title">TITTLE ACTIVITY</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </a>
            </div>    
            <div class="col-lg-4 col-md-6 wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
                <a href="{{route('creativedetail')}}" class="creative__item">
                    <img src="{{asset('clients/images/creative/item3.jpg')}}" alt="" class="img-fluid">
                    <span class="creative__item--desc">
                        Lorem ipsum dolor sit amet
                    </span>
                    <div class="creative__item--detail">
                        <div>
                            <div class="icon">
                                <img src="{{asset('clients/images/arrow-down-4.png')}}" alt="">
                            </div>
                            <h3 class="creative__item--detail__title">TITTLE ACTIVITY</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </a>
            </div>     --}}
        </div>
    </div>
</section>
@endif
@endsection