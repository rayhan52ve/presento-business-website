<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.head')
    </head>
    <body class="sb-nav-fixed">
        @include('includes.top-nav')
        <div id="layoutSidenav">
            @include('includes.side-nav')
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                @include('includes.footer')
            </div>
        </div>
        @include('includes.script')
    </body>
</html>
