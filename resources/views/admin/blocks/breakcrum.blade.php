<div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <div class="d-flex flex-column">
                <h2 class="text-white font-weight-bold my-2 mr-5">
                    {{isset($menu_current)?$menu_current:'Dashboard'}}
                </h2>
                @if(isset($menu_current))
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <a href="{{route('dashboard')}}" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        @if(isset($menu_current_sub))
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="{{route($route_parent)}}" class="text-white text-hover-white opacity-75 hover-opacity-100"> {{$menu_current}} </a>
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100"> {{$menu_current_sub}} </a>
                        @else                            
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100"> {{$menu_current}} </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        {{-- <div class="d-flex align-items-center">
            <a href="#" class="btn btn-transparent-white font-weight-bold py-3 px-6 mr-2">
                Thêm mới
            </a>
            <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Quick actions">
                <a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </a>
                <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                    <ul class="navi navi-hover py-5">
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                                <span class="navi-text">New Group</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> --}}
    </div>
</div>