@extends('back_end.master')

@section('content')

<div class="row mt-5">
    <div class="col-lg-4">
    <a href="{{url('/add_item')}}" class="btn btn-outline-warning ">Add Item</a>
    </div>
    <div class="col-lg-12 mt-3">
        <table class="table table-striped text-center">
            <thead class="bg-success text-light">
              <tr>
                <th scope="col">Sl</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>

                <th scope="col">Category name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>

              </tr>

            </thead>
            <tbody>
             @foreach ($items as $key=>$item)
             <tr>
             <th scope="row">{{$key+1}}</th>
             <td>
                <img height="100" width="100" src="{{url($item->image)}}" alt="">
            </td>
                <td>{{$item->name}}</td>

                 <td>{{$item->category_name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->price}}</td>
                <td>
                <a href="{{url('/edit_item')}}/{{$item->id}}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{url('/delete_item')}}/{{$item->id}}" class="btn btn-danger btn-sm">Delete</a>
                </td>

              </tr>
             @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
