@extends('back_end.master')

@section('content')
    <div class="row mt-5">
       <div class="col-lg-10">
       <form action="{{url('/update_item')}}" method="POST" enctype="multipart/form-data">
          @csrf
       <input type="hidden" name="item_id" value="{{$item->id}}">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"  {{ $item->category_id == $category->id ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>

                          </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" value="{{$item->name}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">

                          </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>

                            <input type="text" class="form-control" value="{{$item->price}}" name="price" placeholder="price">

                          </div>
                    </div>
                </div>





                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>

                    <textarea placeholder="Enter name" class="form-control" name="description" id="" cols="30" rows="3">
                        {{$item->description}}
                    </textarea>

                  </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>

                    <input type="file" name="image" onchange="document.getElementById('holdItemImg').src = window.URL.createObjectURL(this.files[0])"  class="form-control">

                    @if ($item->image)

                    <img id="holdItemImg" src="{{url($item->image)}}"  class="img-fluid mt-1 outline-no" height="100" width="100">
                    @endif

                  </div>

                <button type="submit"  class="btn btn-success btn-sm">Update</button>
                <span class="btn btn-info btn-sm "><a href="{{route('item.index')}}" class="text-white">Back</a></span>
        </form>
       </div>
    </div>
@endsection
