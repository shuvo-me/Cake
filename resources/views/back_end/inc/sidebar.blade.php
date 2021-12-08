<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{url('/dashoard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{url('/view_profile')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Your Profile
                </a>
               @php
                   $total_admins = DB::table('admins')->count();
                   $total_stuffs = DB::table('stuffs')->count();
                   $total_clients = DB::table('clients')->count();
               @endphp
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts_userlist" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts_userlist" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('/all_admins')}}"><i class="fas fa-circle mr-2"></i> Admins ({{$total_admins}})</a>
                        <a class="nav-link" href="{{url('/all_stuffs')}}"><i class="fas fa-circle mr-2"></i>  Stuffs ({{$total_stuffs}}) </a>
                        <a class="nav-link" href="{{url('/all_clients')}}"><i class="fas fa-circle mr-2"></i>  Clients ({{$total_clients}}) </a>
                    </nav>
                </div>


                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="{{url('/slider')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Slider
                </a>
                <a class="nav-link" href="{{url('/category')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Category
                </a>
                <a class="nav-link" href="{{url('/item')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Items
                </a>
                <a class="nav-link" href="{{url('/reservation')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Reservation
                </a>
                <a class="nav-link" href="{{url('/conct_msg')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Conatact Message
                </a>

                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-fan"></i></div>
                    Order Management
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('/pending_order')}}"><i class="fas fa-circle mr-2"></i> Pendin Orders</a>
                        <a class="nav-link" href="{{url('/complete_orders')}}"><i class="fas fa-circle mr-2"></i>  Complete Orders</a>
                        <a class="nav-link" href="{{url('/decline_orders')}}"><i class="fas fa-circle mr-2"></i>  Decline Orders</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    General Settings
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('/pending_order')}}"><i class="fas fa-circle mr-2"></i> Shipping Method</a>
                        <a class="nav-link" href="{{url('/complete_orders')}}"><i class="fas fa-circle mr-2"></i>  Packageing</a>

                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Home Page Settings
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('/pending_order')}}"><i class="fas fa-circle mr-2"></i> Shipping Method</a>
                        <a class="nav-link" href="{{url('/complete_orders')}}"><i class="fas fa-circle mr-2"></i>  Packageing</a>

                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Payment Gateways
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('/pending_order')}}"><i class="fas fa-circle mr-2"></i> Shipping Method</a>
                        <a class="nav-link" href="{{url('/complete_orders')}}"><i class="fas fa-circle mr-2"></i>  Packageing</a>

                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage4" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Manage Stuff
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePage4" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
