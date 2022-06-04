@extends('clients.layouts.main')
@section('content')
<section class="project">
    <div class="container">
	<img src="https://hunterone.net/wp-content/uploads/2018/06/SNA_4.jpg" class="img-fluid">
	<div class="project__title">
		<h1>{{$data->title}}</h1>
		<span class="project__category">| {{$data->tags}}</span>
	</div>
	<div class="project__content">
		<div class="row content-m">
			<div class="col-sm-12 text-left">
               {!! $data->description !!}
                {{-- <div class="social">
                <p><a href="https://www.facebook.com/sharer/sharer.php?u=http://hunterone.net/sna-battle-of-the-year/" target="_blank" rel="noopener"><img loading="lazy" class="alignnone wp-image-193" src="http://dev2.bensturdy.com/wp-content/uploads/2018/05/facebook.png" alt="" width="30" height="30" srcset="https://hunterone.net/wp-content/uploads/2018/05/facebook.png 182w, https://hunterone.net/wp-content/uploads/2018/05/facebook-150x150.png 150w" sizes="(max-width: 30px) 100vw, 30px"></a> <a href="http://pinterest.com/pin/create/button/?url=http://hunterone.net/sna-battle-of-the-year/&amp;description=SNA Battle Of The Year" target="_blank" rel="noopener"><img loading="lazy" class="alignnone wp-image-194" src="http://dev2.bensturdy.com/wp-content/uploads/2018/05/pinterest.png" alt="" width="30" height="30" srcset="https://hunterone.net/wp-content/uploads/2018/05/pinterest.png 182w, https://hunterone.net/wp-content/uploads/2018/05/pinterest-150x150.png 150w" sizes="(max-width: 30px) 100vw, 30px"></a> <a href="http://twitter.com/share?text=SNA Battle Of The Year&amp;url=http://hunterone.net/sna-battle-of-the-year/" target="_blank" rel="noopener"><img loading="lazy" class="alignnone wp-image-195" src="http://dev2.bensturdy.com/wp-content/uploads/2018/05/twitter.png" alt="" width="30" height="30" srcset="https://hunterone.net/wp-content/uploads/2018/05/twitter.png 182w, https://hunterone.net/wp-content/uploads/2018/05/twitter-150x150.png 150w" sizes="(max-width: 30px) 100vw, 30px"></a></p>
                </div>
                <p>&nbsp;</p> --}}
            </div>
            @if($data->photos)
            @php 
            $photos = explode(',', $data->photos);
            @endphp
            @if($photos)
            <div class="project__content--images">
                @foreach($photos as $pt)
                    <img class="img-fluid" src="{{asset('uploads/'.$pt)}}" alt=""/>
                @endforeach
            </div>
            @endif
            @endif
        </div>
    </div>
    @if($related)
    <div class="projects project__related">
        <div class="" id="related">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Related projects</h3>
                </div>
            </div>
            <div class="row">
                @foreach($related as $dt)
                    <div class="col-lg-4 col-md-6 item">
                        <a href="./project/{{$dt->slug}}.html" class="projects__item">
                            <div class=" projects__item--img" style="background-image: url({{asset('uploads/'.$dt->cover)}}); background-size: cover; height: 425px; background-position: center center; background-repeat: no-repeat no-repeat;"></div>
                        </a>
                        <a href="./project/{{$dt->slug}}.html" class="projects__item">
                            <h2 class=" projects__item--title">
                                {{$dt->title}}							
                                <span>{{$dt->tags}}</span>
                            </h2>
                        </a>
                    </div>  
                @endforeach  
            </div>
        </div>
    </div>
    @endif
 </section>
 @endsection