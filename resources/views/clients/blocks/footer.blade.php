@php
use App\Models\Setting;    
@endphp
<div class="footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-sm-6 col-xs-6 footer__logolist">
                <div class="footer__logolist--item">
                    <a href="/" class="footer__logo"><img src="{{asset('logo.png')}}" alt="SoWat Station" class="img-fluid"></a>
                    <div class="footer__member--text">A MEMBER OF</div>
                    <a href="https://thehuntergroup.asia" target="_blank" class="footer__logohunter"><img src="{{asset('clients/images/logo__hunter.png')}}" alt="The Hunter Group" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-md-offset-1">
                <div class="footer__follow">
                    Follow us
                </div>
                <ul class="footer__social">
                    <li><a href="{!! Setting::getValue('facebook') !!}" target="_blank"><img src="{{asset('clients/images/facebook.png')}}" alt="" class="img-fluid"></a></li>
                    <li><a href="{!! Setting::getValue('instagram') !!}" target="_blank"><img src="{{asset('clients/images/instagram.png')}}" alt="" class="img-fluid"></a></li>
                </ul>
                <div class="footer__follow">
                    Contact us
                </div>
                <p>{!! Setting::getValue('address') !!}</p>
                <a class="footer__email" href="mailto:{!! Setting::getValue('contact_email') !!}">{!! Setting::getValue('contact_email') !!}</a>
                <div class="footer__copyright"><span>Copyright 2022 SoWat Station</span> <span>| All Right Reserved</span></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('clients/js/jquery-3.6.0.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('clients/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('clients/js/js.js?'.time())}}"></script>