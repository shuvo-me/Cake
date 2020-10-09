@extends('back_end.master')

@section('content')

<div class="row mt-5">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-success">
                Add New Category
            </div>

            <div class="card-body">
            <form method="POST" action="{{url('/add_category')}}">
                @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
                      <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category_name">

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <table class="table table-striped text-center">
            <thead class="bg-info">
              <tr>
                <th scope="col">Sl</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>

              </tr>

            </thead>
            <tbody>
             @foreach ($categories as $key=>$category)
             <tr>
             <th scope="row">{{$key+1}}</th>
                <td>{{$category->name}}</td>
                <td>
                <a href="{{url('/edit_category')}}/{{$category->id}}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{url('/delete_category')}}/{{$category->id}}" class="btn btn-danger btn-sm">Delete</a>
                </td>

              </tr>
             @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
