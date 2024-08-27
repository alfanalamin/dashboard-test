@extends('layouts.app')

@section('title', 'Create New Order')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('orders.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Create New Order</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Orders</a></div>
                    <div class="breadcrumb-item">Create New Order</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Create New Order</h2>
                <p class="section-lead">
                    On this page you can create a new Order and fill in all fields.
                </p>
                <div class="card">
                    <div class="card-header">
                        <h4>Order Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Product</label>
                                        <select name="product_id" class="form-control select2" required>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="phone_number" class="form-control phone-number"
                                                required>
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Date Time Picker</label>
                                        <input type="text" class="form-control datetimepicker" name="order_date">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Province</label>
                                        <select class="form-control select2" name="province" id="province">
                                            <option value="">Pilih Provinsi</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province['province_id'] }}">{{ $province['province'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Regency</label>
                                        <select class="form-control select2" name="regency" id="regency">
                                            <!-- Options akan diisi melalui JavaScript -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Subdistrict</label>
                                        <select class="form-control select2" name="subdistrict" id="subdistrict">
                                            <!-- Options akan diisi melalui JavaScript -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Guard</label>
                                        <input type="text" name="guard" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status_id" class="form-control select2" required>
                                            @foreach ($status as $stat)
                                                <option value="{{ $stat->id }}">{{ $stat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create Order</button>
                                <a href="{{ route('orders.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#province').change(function() {
                var provinceId = $(this).val();

                $('#regency').empty();
                $('#subdistrict').empty();

                if (provinceId) {
                    $.ajax({
                        url: "{{ route('get-cities') }}",
                        type: "GET",
                        data: {
                            province_id: provinceId
                        },
                        success: function(data) {
                            $('#regency').append(
                                '<option value="">Pilih Kabupaten/Kota</option>');
                            $.each(data, function(key, city) {
                                $('#regency').append('<option value="' + city.city_id +
                                    '">' + city.city_name + '</option>');
                            });
                        }
                    });
                }
            });

            $('#regency').change(function() {
                var cityId = $(this).val();

                $('#subdistrict').empty();

                if (cityId) {
                    $.ajax({
                        url: "{{ route('get-subdistricts') }}",
                        type: "GET",
                        data: {
                            city_id: cityId
                        },
                        success: function(data) {
                            $('#subdistrict').append(
                                '<option value="">Pilih Kecamatan</option>');
                            $.each(data, function(key, subdistrict) {
                                $('#subdistrict').append('<option value="' + subdistrict
                                    .subdistrict_id + '">' + subdistrict
                                    .subdistrict_name + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>
@endpush
