@php
use App\Models\Setting;
@endphp
<!doctype html>
<html lang="en">
<head>
    <title>{{$title}}</title>
    <meta name="description" content="{!!$meta_description??Setting::getValue('meta_home')!!}" />
    <meta property="og:image" itemprop="thumbnailUrl" content="{!!asset('uploads/'. ($meta_thumbnail??Setting::getImage('meta_thumnail')))!!}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('favicon-sowat.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@500&family=Prompt:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('clients/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('clients/css/style.css?'.time())}}">
    @yield('css')
    {!!Setting::getValue('ga')!!}
</head>
<body>
    <div class="wrapper">
        @include('clients.blocks.header')
        @yield('content')
        @include('clients.blocks.footer')
    </div>
    <div id="loading">
        <img src="{{asset('clients/images/loading.gif')}}" alt="">
    </div>
    @yield('script')
</body>
</html>