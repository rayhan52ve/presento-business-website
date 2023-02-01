<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layout.includes.head')
    </head>
    <body class="sb-nav-fixed">
        @include('layout.includes.top-nav')
        <div id="layoutSidenav">
            @include('layout.includes.side-nav')
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                @include('layout.includes.footer')
            </div>
        </div>
        @include('layout.includes.script')
    </body>
</html>
