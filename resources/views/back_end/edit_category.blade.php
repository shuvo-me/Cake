@extends('back_end.master')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-success">
                    Edit Category
                </div>

                <div class="card-body">
                <form method="POST" action="{{url('/update_category')}}">
                    @csrf
                <input type="hidden" name="category_id" value="{{$item->id}}">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" value="{{$item->name}}" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter update_category_name">

                        </div>
                        <a href="{{url('/category')}}" class="btn btn-warning btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
@endsection
