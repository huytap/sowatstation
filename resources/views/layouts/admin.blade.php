<!DOCTYPE html>
<html lang="en" >
    <head>
        <base href="">
        <meta charset="utf-8"/>
        <title>Administrator - {{$title}}</title>
        <meta name="description" content="Updates and statistics"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->
        @yield('css')
        <link href="{{asset('assets/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/admin/assets/plugins/global/plugins.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/admin/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/admin/assets/css/style.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="{{asset('assets/admin/assets/media/logos/favicon.ico')}}"/>
        <style>
            .table th, .table td{
                vertical-align: middle;
            }
        </style>
    </head>
    <body  id="kt_body" style="background-image: url({{asset('assets/admin/assets/media/bg/bg-10.jpg')}}"  class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading"  >
        @if(\Request::getRequestUri() !== '/admin/login')
            @include('admin.blocks.header_mobile')
            <div class="d-flex flex-column flex-root">
                <div class="d-flex flex-row flex-column-fluid page">
                    <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                        
                        @include('admin.blocks.header')
                        @include('admin.blocks.breakcrum')

                        <div class="d-flex flex-column-fluid">
                            <div class="container">
                                @yield('content')
                            </div>
                        </div>

                        @include('admin.blocks.footer')
                    </div>
                </div>
            </div>
        @else
            @yield('content')
        @endif
        <script>
            var KTAppSettings = {
                "breakpoints": {
                    "sm": 576,
                    "md": 768,
                    "lg": 992,
                    "xl": 1200,
                    "xxl": 1200
                },
                "colors": {
                    "theme": {
                        "base": {
                            "white": "#ffffff",
                            "primary": "#6993FF",
                            "secondary": "#E5EAEE",
                            "success": "#1BC5BD",
                            "info": "#8950FC",
                            "warning": "#FFA800",
                            "danger": "#F64E60",
                            "light": "#F3F6F9",
                            "dark": "#212121"
                        },
                        "light": {
                            "white": "#ffffff",
                            "primary": "#E1E9FF",
                            "secondary": "#ECF0F3",
                            "success": "#C9F7F5",
                            "info": "#EEE5FF",
                            "warning": "#FFF4DE",
                            "danger": "#FFE2E5",
                            "light": "#F3F6F9",
                            "dark": "#D6D6E0"
                        },
                        "inverse": {
                            "white": "#ffffff",
                            "primary": "#ffffff",
                            "secondary": "#212121",
                            "success": "#ffffff",
                            "info": "#ffffff",
                            "warning": "#ffffff",
                            "danger": "#ffffff",
                            "light": "#464E5F",
                            "dark": "#ffffff"
                        }
                    },
                    "gray": {
                        "gray-100": "#F3F6F9",
                        "gray-200": "#ECF0F3",
                        "gray-300": "#E5EAEE",
                        "gray-400": "#D6D6E0",
                        "gray-500": "#B5B5C3",
                        "gray-600": "#80808F",
                        "gray-700": "#464E5F",
                        "gray-800": "#1B283F",
                        "gray-900": "#212121"
                    }
                },
                "font-family": "Poppins"
            };
        </script>
        <!--end::Global Config-->
        <script src="{{asset('assets/admin/assets/plugins/global/plugins.bundle.js?v=7.0.6')}}"></script>
        <script src="{{asset('assets/admin/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6')}}"></script>
        <script src="{{asset('assets/admin/assets/js/scripts.bundle.js?v=7.0.6')}}"></script>
        <script src="{{asset('assets/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.6')}}"></script>
        <script src="{{asset('assets/admin/assets/js/pages/widgets.js?v=7.0.6')}}"></script>
        @yield('js')
    </body>
</html>
