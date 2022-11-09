<div class="header" id="header">
    <div class="container">
        <div class="navbar nav-container">
            <a href="{{route('home')}}" class="header__logo"><img src="{{asset('logo.png')}}" class="img-fluid" alt="Sowat Station" /></a>
            <a class="header__menuicon" data-bs-toggle="collapse" href="#menu" role="button" aria-expanded="false" aria-controls="menu">
                <img src="{{asset('clients/images/icon-menu.png')}}" alt="" class="img-fluid">
            </a>
        </div>
    </div>
</div>
<nav class="menu collapse" id="menu">
    <div class="container">
        <div class="menu__top">
            <a href="{{route('home')}}" class="menu__top--logo" href="#"><img src="{{asset('logo.png')}}" class="img-fluid" alt="Sowat Station"></a>
            <a class="navbar-toggler menu__top--close" id="iconclose" data-bs-toggle="collapse" href="#menu" role="button" aria-expanded="false" aria-controls="menu">
                <img src="{{asset('clients/images/button-close-menu.png')}}" alt="" class="img-fluid" />
            </a>
        </div>
        <ul id="navbar" class="menu__list text-end">
            <li><a href="{{route('home')}}">HOME</a></li>
            <li><a href="{{route('about')}}">ABOUT US</a></li>
            <li><a href="{{route('creative')}}">CREATIVE<br/> ACTIVITIES</a></li>
            <li><a href="{{route('store')}}">STORE</a></li>
        </ul>
    </div>
</nav>