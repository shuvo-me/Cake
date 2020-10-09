@extends('back_end.master')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-heder bg-warning text-white text-center p-2">
                   <h5> Edit Slider</h5>
                </div>

                <div class="card-body">
                <form action="{{url('/update_slider')}}" method="POST" enctype="multipart/form-data">
                 @csrf
                <input type="hidden" name="slider_id" value="{{$item->id}}">
                     <div class="form-group">

                     <input type="text" name="title" value="{{$item->title}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">

                     </div>
                     <div class="form-group">

                     <input type="text" name="sub_title" value="{{$item->sub_title}}" class="form-control" id="exampleInputPassword1" placeholder="Subtitle">
                     </div>
                     <div class="form-group">

                         <input type="file" name="image" onchange="document.getElementById('bah').src = window.URL.createObjectURL(this.files[0])"  class="form-control">

                         <img id="bah" class="img-fluid mt-1">
                     </div>

                     <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
@endsection
