@extends('Backend.layout.master')

@section('page_title', 'dashboard')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Cards</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-4">
                <div class="card bg-info text-white mb-4">
                    <div class="card-header">
                        <h5>Super Admin</h5>
                    </div>
                    <div class="card-body text-center">
                        <h2>5</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-header">
                        <h5>Admin</h5>
                    </div>
                    <div class="card-body text-center">
                        <h2>6</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4">
                <div class="card bg-success text-white mb-4">
                    <div class="card-header">
                        <h5>User</h5>
                    </div>
                    <div class="card-body text-center">
                        <h2>4</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-header">
                        <h5>Blood Donor</h5>
                    </div>
                    <div class="card-body text-center">
                        <h2>454</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4">
                <div class="card text-white mb-4" style="background-color: rgb(53, 53, 98)">
                    <div class="card-header">
                        <h5>Workers</h5>
                    </div>
                    <div class="card-body text-center">
                        <h2>345</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View
                            Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4">
                <div class="card text-white mb-4" style="background-color: rgb(79, 164, 79)">
                    <div class="card-header">
                        <h5>Others</h5>
                    </div>
                    <div class="card-body text-center">
                        <h2>456</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('msg'))
        @push('js')
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: '{{ session('cls') }}',
                    toast: 'true',
                    title: '{{ session('msg') }}',
                    showConfirmButton: false,
                    confirmButtonText: "ok",
                    timerProgressBar: true,
                    showCancelButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showCloseButton: true,
                    timer: 15000
                })
            </script>
        @endpush
    @endif

@endsection
