@extends('layouts.app')

@section('title', 'Show Status Member')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('status.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Show Status Member</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Status Member</a></div>
                    <div class="breadcrumb-item">Show Status Member</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Show Status Member</h2>
                <p class="section-lead">
                    Below is the detailed information for this Status Member.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Status Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name Status
                                        Member</label>
                                    <div class="col-sm-12 col-md-7">
                                        <p>{{ $status->name }}</p>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <a href="{{ route('status.edit', $status->id) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('status.index') }}" class="btn btn-secondary">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
