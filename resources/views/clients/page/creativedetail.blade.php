@extends('clients.layouts.main')
@section('content')
<section class="project">
    <div class="container">
	<img src="{{asset('clients/images/creative/creative-detail.jpg')}}" class="img-fluid">
	<div class="project__title">
		<h1>TITTLE ACTIVITY</h1>
	</div>
	<div class="project__content">
		<div class="row content-m">
			<div class="col-sm-12 text-left">
               <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
               </p>
            </div>
            <div class="col-md-12">
                <div class="sowater">
                    <h3>Lorem Ipsum</h3>
                    <div class="avatar" style="background: url({{asset('uploads/1d808487a2a1a76b69c8a794b2795bb0.jpg')}}) no-repeat center -10px;background-size: 150%;">
                    </div>
                    <ul>
                        <li><span>Host:</span> Lorem ipsum</li>
                        <li><span>Title:</span> consectetuer </li>
                        <li><span>About:</span> sed diam nonummy nibh euismod</li>
                    </ul>
                </div>
            </div>
            <div class="project__content--images">
                <img class="img-fluid" src="{{asset('clients/images/creative/creative-desc.jpg')}}" alt=""/>
            </div>
            <a href="#" class="btn__join"><img src="{{asset('clients/images/btnJoin.png')}}" alt=""></a>
        </div>
    </div>
    <div class="creative">
        <h3 class="creative__title">Related projects</h3>
        <div class="row">
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
            </div>    
        </div>
    </div>
 </section>
 @endsection