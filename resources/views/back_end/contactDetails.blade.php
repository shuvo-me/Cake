@extends('back_end.master')

@section('content')
<div class="row mt-5">
    <div class="col-8 mx-auto">
        <div class="card">
    <div class="card_header bg-info d-flex justify-content-between align-items-ceter">
                <div class="text-white p-3">
                    Details of  {{$contact->name??""}}
                </div>
                <a href="{{route('contact.all')}}" class="btn btn-sm btn-success">Back</a>
            </div>
            <div class="card_body p-3">
                <p>Name: {{$contact->name??""}}</p>
                <p>Email {{$contact->email??""}}</p>
                <p>Message: {{$contact->message??""}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
