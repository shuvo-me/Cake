@extends('back_end.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-header bg-info text-white">
                        <b>My Profile</b>
                    </div>
                    <div class="card-body">
                        <form action="{{url('update_profile')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Full Name :</label>
                                                <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>NID :</label>
                                                <input type="text" name="nid"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Contact :</label>
                                                <input type="text" name="contact" class="form-control">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12 text-center pt-4">
                                            <input type="submit" value="Update Information" class="btn btn-success rounded">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>

                                                    <br>
                                                    <label>Upload Your Image :</label>
                                                    <input type="file" name="image" id="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                    <img id="blah" class="img-fluid">
                                                </label>
                                            </div>




                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
