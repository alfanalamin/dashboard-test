@extends('layouts.app')

@section('title', 'Edit Order')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('orders.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Order</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Orders</a></div>
                    <div class="breadcrumb-item">Edit Order</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Order</h2>
                <p class="section-lead">
                    On this page you can edit an existing Order and update all fields.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Your Order</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $order->name }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $order->email }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="product_id" class="form-control select2" required>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}"
                                                        {{ $product->id == $order->product_id ? 'selected' : '' }}>
                                                        {{ $product->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone
                                            Number</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="phone_number" class="form-control"
                                                value="{{ $order->phone_number }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="address" class="form-control"
                                                value="{{ $order->address }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Subdistrict</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="subdistrict" class="form-control"
                                                value="{{ $order->subdistrict }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Guard</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="guard" class="form-control"
                                                value="{{ $order->guard }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Regency</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="regency" class="form-control"
                                                value="{{ $order->regency }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Province</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="province" class="form-control"
                                                value="{{ $order->province }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="status_id" class="form-control select2" required>
                                                @foreach ($status as $status)
                                                    <option value="{{ $status->id }}"
                                                        {{ $status->id == $order->status_id ? 'selected' : '' }}>
                                                        {{ $status->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" class="btn btn-primary">Update Order</button>
                                            <a href="{{ route('orders.index') }}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
