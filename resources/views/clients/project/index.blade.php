@extends('clients.layouts.main')
@section('content')
<section class="projects">
    <div class="container">
        <div class="filter-controls cate projects__nav">
            <a class="btn btn-default filter-button" data-filter="all">All</a>
            @foreach($category as $ct)
                <button class="btn btn-default filter-button" data-filter="{{$ct->slug}}">
                    {{$ct->title}}                
                </button>
            @endforeach
        </div>
        <div class="works-filter-container">
            <div class="row" id="project">
            @foreach($data as $dt)
                <div class="col-lg-4 col-md-6 item wow fadeInUp filter digital-design social  animated" data-id="1712" style="visibility: visible; animation-name: fadeInUp;">
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
</section>
@endsection