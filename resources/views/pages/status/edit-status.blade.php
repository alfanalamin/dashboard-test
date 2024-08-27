@extends('layouts.app')

@section('title', 'Edit Status Member')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('status.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Status Member</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Status Member</a></div>
                    <div class="breadcrumb-item">Edit Status Member</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Status Member</h2>
                <p class="section-lead">
                    On this page you can edit an existing Status Member and update all fields.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Your Status Member</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('status.update', $status->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name
                                            Status Member</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $status->name }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary" type="submit">Update Status</button>
                                            <a href="{{ route('status.index') }}" class="btn btn-danger">Cancel</a>
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
