<div class="header" id="header">
    <div class="container">
        <div class="navbar nav-container">
            <a href="{{route('home')}}" class="header__logo wow fadeInUp" data-wow-duration="1.5s"><img src="{{asset('logo.png')}}" class="img-fluid" alt="Sowat Station" /></a>
            <a class="header__menuicon wow fadeInUp" data-wow-duration="1.5s" data-bs-toggle="collapse" href="#menu" role="button" aria-expanded="false" aria-controls="menu">
                <img src="{{asset('clients/images/icon-menu.png')}}" alt="" class="img-fluid">
            </a>
        </div>
    </div>
</div>
<nav class="menu collapse" id="menu">
    <div class="container">
        <div class="menu__top">
            <a href="{{route('home')}}" href="#"><img src="{{asset('logo.png')}}" class="img-fluid" alt="Sowat Station"></a>
            <a class="navbar-toggler" id="iconclose" data-bs-toggle="collapse" href="#menu" role="button" aria-expanded="false" aria-controls="menu">
                <img src="{{asset('clients/images/close.jpg')}}" alt="" />
            </a>
        </div>
        <ul id="navbar" class="menu__list text-end">
            <li><a href="{{route('home')}}">HOME</a></li>
            <li><a href="{{route('home')}}">ABOUT US</a></li>
            <li><a href="{{route('sowater')}}">CREATIVE ACTIVITIES</a></li>
            <li><a href="#">STORE</a></li>
        </ul>
    </div>
</nav>