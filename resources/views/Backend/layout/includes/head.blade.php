<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Dashboard | @yield('page_title')</title>
<link rel="shortcut icon" href="frontend/assets/img/woman.png" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('backend/custom-style.css')}}">
<style>
    /* @import url('https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&family=Poppins:ital,wght@0,200;0,300;0,900;1,200&display=swap'); */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,900;1,200&display=swap');
    nav {
        font-family: 'Nanum Pen Script', cursive;
    }
    h1,h2,h3,h4,h5,b,th,a {
        font-family: 'Nanum Pen Script', cursive;
    }
    body {
        font-family: 'Nanum Pen Script', cursive;
        /* font-family: 'Poppins', sans-serif; */
    }
</style>
@stack('css')
