@extends('back_end.master')

@section('content')
  <div class="row mt-5">
      <div class="col-8 mx-auto">
          <div class="card">
              <div class="card_header bg-success py-4">
                  <div class="title text-white px-3">All Contacts</div>
              </div>
          </div>
          <div class="card_body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @forelse ($contacts as $item)

                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$item->name}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->message}}</td>
                      <td>
                          <a href="{{route('contact.details',['contact'=>$item->id])}}" class="btn btn-info btn-sm">Details</a>
                      </td>
                    </tr>
                    @empty

                    @endforelse

                </tbody>
              </table>
          </div>
      </div>
  </div>
@endsection
