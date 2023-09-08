@foreach($data as $dt)
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