@php
use App\Models\Setting;    
@endphp
<div class="footer">
    <div class="container">
        <div class="row align-items-start">
            <div class="col col-md-1 col-sm-3 col-xs-12 wow fadeInUp" data-wow-duration="1.5s">
                We are
            </div>
            <div class="col col-md-2 col-sm-5 col-xs-6 col-md-offset-1 wow fadeInUp" data-wow-duration="1.5s">
                <a href="#" class="footer__logo"><img src="{{asset('logo.png')}}" alt="SoWat Station" class="img-fluid"></a>
            </div>
            <div class="col col-md-3 col-sm-5 col-xs-6 p-0 m-n1 col-md-offset-2 wow fadeInUp" data-wow-duration="1.5s">
                <a href="#" class="footer__logosowat"><img src="{{asset('sowat_logo.png')}}" alt="SoWat" class="img-fluid"></a>
            </div>
            <div class="col-6 wow fadeInUp" data-wow-duration="1.5s">
                <ul class="footer__social">
                    <li>Follow us on</li>
                    <li><a href="{!! Setting::getValue('facebook') !!}" target="_blank"><img src="{{asset('clients/images/fb.png')}}" alt="" class="img-fluid"></a></li>
                    <li><a href="{!! Setting::getValue('instagram') !!}" target="_blank"><img src="{{asset('clients/images/insta.png')}}" alt="" class="img-fluid"></a></li>
                </ul>
                <p>{!! Setting::getValue('address') !!}</p>
                <a href="mailto:{!! Setting::getValue('contact_email') !!}">{!! Setting::getValue('contact_email') !!}</a>
                <p>Copy 2022 SoWat Station | All Right Reserved</p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('clients/js/jquery-3.6.0.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('clients/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('clients/js/js.js?'.time())}}"></script>