<!DOCTYPE html>
<html lang="en">
    <head>
        @include('Backend.layout.includes.head')
    </head>
    <body class="sb-nav-fixed">
        @include('Backend.layout.includes.top-nav')
        <div id="layoutSidenav">
            @include('Backend.layout.includes.side-nav')
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                @include('Backend.layout.includes.footer')
            </div>
        </div>
        @include('Backend.layout.includes.script')
    </body>
</html>
