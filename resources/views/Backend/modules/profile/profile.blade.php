@extends('Backend.layout.master')

@section('page_title', 'Create-category')

@section('content')
    <div class="container-fluid col-xl-10 col-md-10 mt-5">
        <div class="row justify-content-between">
            <div class="col-md-8">
                <div class="card m-4">
                    <div class="card-header">
                        <h3>Profile</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form" method="POST" action="{{ route('category.store') }}">
                            @csrf
                            <label class="control-label" for="name">Name</label>
                            <input name="name" id="name" type="text" placeholder="Category Name"
                                class="form-control @if ($errors->all()) {{ $errors->has('name') ? 'is-invalid' : 'is-valid' }} @endif"
                                value="{{ auth()->user()->name }}">

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="control-label" for="division_id">Select Division</label>
                                    <select id="division_id" name="division_id"
                                        class="form-control form-select @if ($errors->all()) {{ $errors->has('division_id') ? 'is-invalid' : 'is-valid' }} @endif"
                                        value="{{ old('division_id') }}">
                                        <option selected disabled>Select Division</option>
                                        @foreach ($divisions as $id => $name)
                                            <option class="text-success" value="{{ $id }}">{{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="division_id">Select District</label>
                                    <select id="district_id" name="district_id" disabled
                                        class="form-control form-select @if ($errors->all()) {{ $errors->has('district_id') ? 'is-invalid' : 'is-valid' }} @endif"
                                        value="{{ old('district_id') }}">
                                        <option selected disabled>Select District</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="division_id">Select Thana</label>
                                    <select id="thana_id" name="thana_id" disabled
                                        class="form-control form-select @if ($errors->all()) {{ $errors->has('thana_id') ? 'is-invalid' : 'is-valid' }} @endif"
                                        value="{{ old('thana_id') }}">
                                        <option selected disabled>Select Thana</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="division_id">Select Union</label>
                                    <select id="union_id" name="union_id" disabled
                                        class="form-control form-select @if ($errors->all()) {{ $errors->has('union_id') ? 'is-invalid' : 'is-valid' }} @endif"
                                        value="{{ old('union_id') }}">
                                        <option selected disabled>Select Union</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer mt-3">
                                <input class="btn btn-outline-primary form-control" type="submit" value="Save">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card m-4">
                    <div class="card-header">
                        <h3>Profile Pic</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form" method="POST" action="">
                            @csrf
                            <label class="control-label" for="name">Name</label>
                            <input name="name" id="name" type="text" placeholder="Category Name"
                                class="form-control @if ($errors->all()) {{ $errors->has('name') ? 'is-invalid' : 'is-valid' }} @endif"
                                value="{{ auth()->user()->name }}">

                            <div class="card-footer mt-3">
                                <input class="btn btn-outline-primary form-control" type="submit" value="Save">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

    @push('js')
        <script>
        $(document).ready(function () {

            const getDistricts = (division_id) => {
                axios.get(`${window.location.origin}/get-districts/${division_id}`).then((res) => {
                    let districts = res.data;
                    let element = $('#district_id');
                    element.removeAttr('disabled');
                    element.empty();
                    element.append(`<option selected disabled>Select District</option>`);
                    $('#thana_id').empty().append(`<option selected disabled >Select Thana</option>`).attr('disabled','disabled');
                    $('#union_id').empty().append(`<option selected disabled >Select Union</option>`).attr('disabled','disabled');
                    districts.map((district, index) => {
                        element.append(`<option value="${district.id}" >${district.name}</option>`);
                    })
                    
                })
            }

            const getThanas = (district_id) => {
                axios.get(`${window.location.origin}/get-thanas/${district_id}`).then((res) => {
                    let thanas = res.data;
                    let element = $('#thana_id');
                    element.removeAttr('disabled');
                    element.empty();
                    element.append(`<option selected disabled>Select Thana</option>`);
                    $('#union_id').empty().append(`<option selected disabled >Select Union</option>`).attr('disabled','disabled');
                    thanas.map((thana, index) => {
                        element.append(`<option value="${thana.id}" >${thana.name}</option>`);
                    })
                    
                })
            }

            const getUnion = (thana_id) => {
                axios.get(`${window.location.origin}/get-unions/${thana_id}`).then((res) => {
                    let unions = res.data;
                    let element = $('#union_id');
                    element.removeAttr('disabled');
                    element.empty();
                    element.append(`<option selected disabled>Select Union</option>`);
                    unions.map((union, index) => {
                        element.append(`<option value="${union.id}" >${union.name}</option>`);
                    })
                    
                })
            }

            $('#division_id').on('change',function(){
                let divisionId = $(this).val();
                getDistricts(divisionId);
            });

            $('#district_id').on('change',function(){
                let districtId = $(this).val();
                getThanas(districtId);
            });

            $('#thana_id').on('change',function(){
                let thanaId = $(this).val();
                getUnion(thanaId);
            });

        });
        </script>
    @endpush
@endsection
