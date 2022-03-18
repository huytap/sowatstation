@php
    $menu_current = 'Setting';
    $route_item = 'setting.create';
    $status = config('adminstatus');
@endphp
@extends('layouts.admin')
@section('css')
    <style>
        td:nth-child(3){
            word-break: break-all;
        }
    </style>
@endsection
@section('content')
<div class="card card-custom gutter-b">
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Setting
                </h3>
            </div>
            <div class="card-toolbar">
                {{-- <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                        fill="#000000"
                                        opacity="0.3"
                                    />
                                    <path
                                        d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                        fill="#000000"
                                    />
                                </g>
                            </svg>
                        </span>
                        Export
                    </button>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                Choose an option:
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-print"></i></span>
                                    <span class="navi-text">Print</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-copy"></i></span>
                                    <span class="navi-text">Copy</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-file-text-o"></i></span>
                                    <span class="navi-text">CSV</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
                                    <span class="navi-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}

                {{-- <a href="{{route($route_item)}}" class="btn btn-primary font-weight-bolder">
                    <span class="fas fa-plus"></span>
                    Add new
                </a> --}}
            </div>
        </div>
        
        <div class="card-body">
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <form method="GET">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" name="key" class="form-control" placeholder="Search" id="kt_datatable_search_query" value="{{request()->key}}"/>
                                        <span><i class="flaticon2-search-1 text-muted"></i></span>
                                    </div>
                                </div>

                                {{-- <div class="col-md-4 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-4 mb-0 d-none d-md-block">Status:</label>
                                        <select class="form-control" name="status" id="kt_datatable_search_status">
                                            <option value="">--All--</option>
                                            @foreach($status as $key => $st)
                                                <option value="{{$key}}" {{ request()->status == $key ? 'selected' : '' }}>{{$st}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <button type="submit" class="btn btn-light-primary px-6 font-weight-bold">
                                    Search
                                </button>
                                {{-- <div class="col-md-4 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                        <select class="form-control" id="kt_datatable_search_type">
                                            <option value="">All</option>
                                            <option value="1">Online</option>
                                            <option value="2">Retail</option>
                                            <option value="3">Direct</option>
                                        </select>
                                    </div>
                                </div> --}}
                            </div>
                        </form>
                    </div>
                    {{-- <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold">
                            Tìm kiếm
                        </a>
                    </div> --}}
                </div>
            </div>
            @if(Session::has('success'))
                <x-alert type="success" icon="flaticon2-bell-4" content="{{Session::get('success')}}"/>
            @elseif(Session::has('error'))
                <x-alert type="danger" icon="flaticon-warning" content="{{Session::get('error')}}"/>
            @endif
            <!--begin: Datatable-->
            <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded" id="">
                <table class="table table-striped">
                    <thead class="datatable-head">
                        <tr class="datatable-row" style="left: 0px;">
                            <th scope="col">#</th>
                            <th scope="col">Key</th>
                            <th scope="col">Value</th>
                            <th scope="col">Status</th>
                            <th scope="col"><span style="width: 125px;">Action</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr data-row="0" class="datatable-row" style="left: 0px;">
                                <td scope="row">{{$key}}</td>
                                <td>{{$item['key']}}</td>
                                <td>{{$item['value']}}</td>
                                <td>
                                    @if($item['status'] == App\Helpers\Enum::SHOW)
                                    <span class="label label-inline label-light-primary font-weight-bold">
                                        Publish
                                    </span>
                                    @else
                                        <span class="label label-inline label-light-danger font-weight-bold">
                                            Unpublish
                                        </span>
                                    @endif
                                </td>                            
                                <td data-field="Actions">
                                    <span style="overflow: visible; position: relative; width: 125px;">
                                        <a href="{{route('setting.edit', $item['id'])}}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
                                            <span class="far fa-edit"></span>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="datatable-pager datatable-paging-loaded">
                    {{ $data->appends(request()->all())->links()}}
                </div>
            </div>
            <!--end: Datatable-->
        </div>
    </div>
</div>
@endsection
@section('js')
    <script type="text/javascript">
        $('.btn-delete').click(function(event){
            event.preventDefault();
            let _href = $(this).attr('href')
            $('#studentForm').attr('action', _href);
            if(confirm('Bạn có chắc muốn xóa dữ liệu này không?')){
                $('#studentForm').submit();
            }
        })
    </script>
    <script type="text/javascript">
        // 'use strict';
        // var KTDatatableDataLocal = function() {
        //     // Private functions

        //     // demo initializer
        //     var data = function() {
        //         var dataJSONArray = JSON.parse('[{"RecordID":1,"OrderID":"0374-5070","Country":"China","ShipCountry":"CN","ShipCity":"Jiujie","ShipName":"Rempel Inc","ShipAddress":"60310 Schiller Center","CompanyEmail":"cdodman0@wsj.com","CompanyAgent":"Cordi Dodman","CompanyName":"Kris-Wehner","Currency":"CNY","Notes":"sed vel enim sit amet nunc viverra dapibus nulla suscipit ligula in lacus curabitur at ipsum ac tellus","Department":"Kids","Website":"tripadvisor.com","Latitude":39.952319,"Longitude":119.598195,"ShipDate":"8/27/2017","PaymentDate":"2016-09-15 22:18:06","TimeZone":"Asia/Chongqing","TotalPayment":"$336309.10","Status":6,"Type":2,"Actions":null},\n' +
        //             '{"RecordID":2,"OrderID":"63868-257","Country":"Philippines","ShipCountry":"PH","ShipCity":"Gibgos","ShipName":"Muller, Leannon and McKenzie","ShipAddress":"26734 Mitchell Drive","CompanyEmail":"kscritch1@google.es","CompanyAgent":"Katrinka Scritch","CompanyName":"Stanton, Friesen and Grant","Currency":"PHP","Notes":"ante vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan odio curabitur","Department":"Tools","Website":"elpais.com","Latitude":13.8503992,"Longitude":123.7585154,"ShipDate":"9/3/2017","PaymentDate":"2016-09-05 16:27:07","TimeZone":"Asia/Manila","TotalPayment":"$786612.37","Status":1,"Type":2,"Actions":null},\n' +
        //             '{"RecordID":100,"OrderID":"50865-056","Country":"Honduras","ShipCountry":"HN","ShipCity":"Yuscarán","ShipName":"Anderson, Pfannerstill and Miller","ShipAddress":"116 Bay Way","CompanyEmail":"hensley2r@businessweek.com","CompanyAgent":"Hamil Ensley","CompanyName":"Kessler, Greenfelder and Gaylord","Currency":"HNL","Notes":"nulla ac enim in tempor turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis","Department":"Kids","Website":"dell.com","Latitude":13.9448964,"Longitude":-86.8508942,"ShipDate":"1/14/2016","PaymentDate":"2016-12-27 22:25:10","TimeZone":"America/Tegucigalpa","TotalPayment":"$386091.31","Status":6,"Type":3,"Actions":null}]');

        //         var datatable = $('#kt_datatable').KTDatatable({
        //             // datasource definition
        //             data: {
        //                 type: 'local',
        //                 source: dataJSONArray,
        //                 pageSize: 10,
        //             },

        //             // layout definition
        //             layout: {
        //                 scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
        //                 // height: 450, // datatable's body's fixed height
        //                 footer: false, // display/hide footer
        //             },

        //             // column sorting
        //             sortable: true,

        //             pagination: true,

        //             search: {
        //                 input: $('#kt_datatable_search_query'),
        //                 key: 'generalSearch'
        //             },

        //             // columns definition
        //             columns: [{
        //                 field: 'RecordID',
        //                 title: '#',
        //                 sortable: false,
        //                 width: 20,
        //                 type: 'number',
        //                 selector: {
        //                     class: ''
        //                 },
        //                 textAlign: 'center',
        //             }, {
        //                 field: 'OrderID',
        //                 title: 'Order ID',
        //             }, {
        //                 field: 'Country',
        //                 title: 'Country',
        //                 template: function(row) {
        //                     return row.Country + ' ' + row.ShipCountry;
        //                 },
        //             }, {
        //                 field: 'ShipDate',
        //                 title: 'Ship Date',
        //                 type: 'date',
        //                 format: 'MM/DD/YYYY',
        //             }, {
        //                 field: 'CompanyName',
        //                 title: 'Company Name',
        //             }, {
        //                 field: 'Status',
        //                 title: 'Status',
        //                 // callback function support for column rendering
        //                 template: function(row) {
        //                     var status = {
        //                         1: {
        //                             'title': 'Pending',
        //                             'class': ' label-light-success'
        //                         },
        //                         2: {
        //                             'title': 'Delivered',
        //                             'class': ' label-light-danger'
        //                         },
        //                         3: {
        //                             'title': 'Canceled',
        //                             'class': ' label-light-primary'
        //                         },
        //                         4: {
        //                             'title': 'Success',
        //                             'class': ' label-light-success'
        //                         },
        //                         5: {
        //                             'title': 'Info',
        //                             'class': ' label-light-info'
        //                         },
        //                         6: {
        //                             'title': 'Danger',
        //                             'class': ' label-light-danger'
        //                         },
        //                         7: {
        //                             'title': 'Warning',
        //                             'class': ' label-light-warning'
        //                         },
        //                     };
        //                     return '<span class="label font-weight-bold label-lg ' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
        //                 },
        //             }, {
        //                 field: 'Type',
        //                 title: 'Type',
        //                 autoHide: false,
        //                 // callback function support for column rendering
        //                 template: function(row) {
        //                     var status = {
        //                         1: {
        //                             'title': 'Online',
        //                             'state': 'danger'
        //                         },
        //                         2: {
        //                             'title': 'Retail',
        //                             'state': 'primary'
        //                         },
        //                         3: {
        //                             'title': 'Direct',
        //                             'state': 'success'
        //                         },
        //                     };
        //                     return '<span class="label label-' + status[row.Type].state + ' label-dot mr-2"></span><span class="font-weight-bold text-' + status[row.Type].state + '">' +
        //                         status[row.Type].title + '</span>';
        //                 },
        //             }, {
        //                 field: 'Actions',
        //                 title: 'Actions',
        //                 sortable: false,
        //                 width: 125,
        //                 overflow: 'visible',
        //                 autoHide: false,
        //                 template: function() {
        //                     return '\
        //                             <div class="dropdown dropdown-inline">\
        //                                 <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown">\
        //                                     <span class="svg-icon svg-icon-md">\
        //                                         <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
        //                                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
        //                                                 <rect x="0" y="0" width="24" height="24"/>\
        //                                                 <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>\
        //                                             </g>\
        //                                         </svg>\
        //                                     </span>\
        //                                 </a>\
        //                                 <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
        //                                     <ul class="navi flex-column navi-hover py-2">\
        //                                         <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">\
        //                                             Choose an action:\
        //                                         </li>\
        //                                         <li class="navi-item">\
        //                                             <a href="#" class="navi-link">\
        //                                                 <span class="navi-icon"><i class="la la-print"></i></span>\
        //                                                 <span class="navi-text">Print</span>\
        //                                             </a>\
        //                                         </li>\
        //                                         <li class="navi-item">\
        //                                             <a href="#" class="navi-link">\
        //                                                 <span class="navi-icon"><i class="la la-copy"></i></span>\
        //                                                 <span class="navi-text">Copy</span>\
        //                                             </a>\
        //                                         </li>\
        //                                         <li class="navi-item">\
        //                                             <a href="#" class="navi-link">\
        //                                                 <span class="navi-icon"><i class="la la-file-excel-o"></i></span>\
        //                                                 <span class="navi-text">Excel</span>\
        //                                             </a>\
        //                                         </li>\
        //                                         <li class="navi-item">\
        //                                             <a href="#" class="navi-link">\
        //                                                 <span class="navi-icon"><i class="la la-file-text-o"></i></span>\
        //                                                 <span class="navi-text">CSV</span>\
        //                                             </a>\
        //                                         </li>\
        //                                         <li class="navi-item">\
        //                                             <a href="#" class="navi-link">\
        //                                                 <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>\
        //                                                 <span class="navi-text">PDF</span>\
        //                                             </a>\
        //                                         </li>\
        //                                     </ul>\
        //                                 </div>\
        //                             </div>\
        //                             <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
        //                                 <span class="svg-icon svg-icon-md">\
        //                                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
        //                                         <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
        //                                             <rect x="0" y="0" width="24" height="24"/>\
        //                                             <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
        //                                             <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
        //                                         </g>\
        //                                     </svg>\
        //                                 </span>\
        //                             </a>\
        //                             <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
        //                                 <span class="svg-icon svg-icon-md">\
        //                                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
        //                                         <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
        //                                             <rect x="0" y="0" width="24" height="24"/>\
        //                                             <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
        //                                             <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
        //                                         </g>\
        //                                     </svg>\
        //                                 </span>\
        //                             </a>\
        //                         ';
        //                 },
        //             }],
        //         });

        //         $('#kt_datatable_search_status').on('change', function() {
        //             datatable.search($(this).val().toLowerCase(), 'Status');
        //         });

        //         $('#kt_datatable_search_type').on('change', function() {
        //             datatable.search($(this).val().toLowerCase(), 'Type');
        //         });

        //         $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
        //     };

        //     return {
        //         // Public functions
        //         init: function() {
        //             // init dmeo
        //             data();
        //         },
        //     };
        // }();

        // jQuery(document).ready(function() {
        //     KTDatatableDataLocal.init();
        // });

    </script>
@endsection