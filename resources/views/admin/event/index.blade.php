@php
    use App\Models\Event;
    $menu_current = 'Event';
    $route_item = 'event.create';
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
                    Event
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
                                <div class="col-md-5 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-4 mb-0 d-none d-md-block">Page:</label>
                                        <select class="form-control" name="page_id" id="kt_datatable_search_status">
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
                            <th scope="col">Cover</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created At</th>
                            <th scope="col"><span style="width: 125px;">Action</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr data-row="0" class="datatable-row" style="left: 0px;">
                                <td scope="row">{{($key+1)}}</td>
                                <td><img src="{{asset('uploads/'.$item->cover)}}" width="100"/></td>
                                <td>{{$item['title']}}</td>
                                <td>{{$item['created_at']}}</td>                            
                                <td data-field="Actions">
                                    <span style="overflow: visible; position: relative; width: 125px;">
                                        <a href="{{route('event.edit', $item['id'])}}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
                                            <span class="far fa-edit"></span>
                                        </a>
                                        <a href="{{route('event.destroy', $item['id'])}}" class="btn btn-sm btn-clean btn-icon btn-delete" title="Delete">
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
<form method="post" class="delete_form" action="" id="studentForm">
    @csrf @method('DELETE')
</form>
@endsection
@section('js')
    <script type="text/javascript">
        $('.btn-delete').click(function(event){
            event.preventDefault();
            let _href = $(this).attr('href')
            $('#studentForm').attr('action', _href);
            if(confirm('Are you sure you want to delete this item?')){
                $('#studentForm').submit();
            }
        })
    </script>
@endsection