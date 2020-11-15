@extends('back_end.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-3 rounded">
                    <div class="card-header bg-info text-white rounded">
                        <b><i class="fas fa-user-shield"></i>  Admin List</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Image</th>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Contact</th>
                                <th scope="col">NID</th>

                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>

                                @foreach ($admins as $key=>$admin)
                                <tr>
                                    <td>
                                        @if($admin->image != null)
                                            <img src="{{url($admin->image)}}" width="60px">
                                        @endif
                                    </td>
                                    <th scope="row">{{$key+1}}</th>

                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->contact}}</td>
                                    <td>{{$admin->nid}}</td>



                                    <td>
                                        <a href="{{url('delete/doctor')}}/{{$admin->id}}" class="btn btn-danger btn-sm rounded"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                          </table>

                          {{-- {{ $admin->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
