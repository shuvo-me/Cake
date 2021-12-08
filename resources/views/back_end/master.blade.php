
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        @include('back_end.inc.css')
    </head>
    <body class="sb-nav-fixed">
       @include('back_end.inc.topNav')
        <div id="layoutSidenav">
            @include('back_end.inc.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </main>
               @include('back_end.inc.footer')
            </div>
        </div>
       @include('back_end.inc.js')
    </body>
</html>
