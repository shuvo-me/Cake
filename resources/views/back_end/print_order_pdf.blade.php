{{-- <img src="{{url('/')}}/front_end/img/logo.png" class="mb-2" alt=""> --}}

<ul style="list-style: none;">

    <li>1000 Lakepoint Dr, Frisco, CO 80443, USA </li>
    <li>Sweetcake@support.com</li>
    <li>+1 800-786-1000</li>
</ul>


@foreach ($shipping_info as $info)
<h6>Name: {{Auth::user()->name}}</h6>
<h6>Country: {{$info->country}}</h6>
<h6>City: {{$info->city}}</h6>
<h6>Phone: {{$info->phone}}</h6>
<h6>Email: {{$info->email}}</h6>
@endforeach
