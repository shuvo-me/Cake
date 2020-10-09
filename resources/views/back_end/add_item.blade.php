@extends('back_end.master')

@section('content')
    <div class="row mt-5">
       <div class="col-lg-10">
       <form action="{{url('/save_item')}}" method="POST" enctype="multipart/form-data">
          @csrf

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <select class="form-control" name="category_name">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                          </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">

                          </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>

                            <input type="text" class="form-control" name="price" placeholder="price">

                          </div>
                    </div>
                </div>





                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>

                    <textarea placeholder="Enter name" class="form-control" name="description" id="" cols="30" rows="3"></textarea>

                  </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>

                    <input type="file" name="image" onchange="document.getElementById('bah').src = window.URL.createObjectURL(this.files[0])"  class="form-control">

                    <img id="bah"  class="img-fluid mt-1 outline-no" height="100" width="100">

                  </div>

                <button type="submit"  class="btn btn-success btn-sm">Add</button>

        </form>
       </div>
    </div>
@endsection
