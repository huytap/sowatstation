@foreach($gallery as $gl)
    <div class="col-md-4">
        <img src="{{asset('uploads/'.$gl->photo)}}" alt="" class="img-fluid">
    </div>
@endforeach