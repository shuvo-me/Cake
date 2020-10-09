@extends('back_end.master')

@section('content')
<div class="row mt-5">
    <div class="col-lg-4">
       <div class="card">
           <div class="card-heder bg-warning text-white text-center p-2">
              <h5> Add New Slider</h5>
           </div>

           <div class="card-body">
           <form action="{{url('/save_slider')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">

                  <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">

                </div>
                <div class="form-group">

                  <input type="text" name="sub_title" class="form-control" id="exampleInputPassword1" placeholder="Subtitle">
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

    <div class="col-lg-8">
        <table class="table table-bordered text-center">
            <thead  class="bg-info text-white">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Sub_title</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($sliders as $key=>$slider)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$slider->title}}</td>
                        <td>{{$slider->sub_title}}</td>
                        <td>
                            @if($slider->image !=null)
                            <img src="{{url($slider->image)}}" height="60" width="60">
                            @endif
                        </td>
                        <td>
                        <a href="{{url('/edit_slider')}}/{{$slider->id}}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{url('/delete_slider')}}/{{$slider->id}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
