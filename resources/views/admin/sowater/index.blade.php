@php
    $menu_current = 'Sowater';
    $route_item = 'sowater.create';
    $status = config('adminstatus');
@endphp
@extends('layouts.admin')
@section('content')

<div class="card card-custom gutter-b">
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Sowater
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{route($route_item)}}" class="btn btn-primary font-weight-bolder">
                    <span class="fas fa-plus"></span>
                    Add new
                </a>
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

                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-4 mb-0 d-none d-md-block">Status:</label>
                                        <select class="form-control" name="status" id="kt_datatable_search_status">
                                            <option value="">--All--</option>
                                            @foreach($status as $key => $st)
                                                <option value="{{$key}}" {{ request()->status == $key ? 'selected' : '' }}>{{$st}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-light-primary px-6 font-weight-bold">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
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
                            <th scope="col">Avatar</th>
                            <th scope="col">Sowater Name</th>
                            <th scope="col">Status</th>
                            <th scope="col"><span style="width: 125px;">Action</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr data-row="0" class="datatable-row" style="left: 0px;">
                                <td scope="row">{{$key}}</td>
                                <td><img src="{{asset('uploads/'.$item->avatar)}}" width="100"/></td>
                                <td scope="row">{{$item->full_name}}</td>
                                <td>
                                    @if($item['status'] == 0)
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
                                        <a href="{{route('sowater.edit', $item['id'])}}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
                                            <span class="far fa-edit"></span>
                                        </a>
                                        <a href="{{route('sowater.destroy', $item['id'])}}" class="btn btn-sm btn-clean btn-icon btn-delete" title="Delete">
                                            <span class="fas fa-trash"></span>
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
<form method="post" class="delete_form" action="" id="deleteForm">
    @csrf @method('DELETE')
</form>
@endsection
@section('js')
    <script type="text/javascript">
        $('.btn-delete').click(function(event){
            event.preventDefault();
            let _href = $(this).attr('href')
            $('#deleteForm').attr('action', _href);
            if(confirm('Are you sure you want to delete this item?')){
                $('#deleteForm').submit();
            }
        })
    </script>
@endsection