@extends('layouts.app')

@section('title', 'Show Category Products')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('categories.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Show Category Products</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Category Products</a></div>
                    <div class="breadcrumb-item">Show Category Products</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Show Category Products</h2>
                <p class="section-lead">
                    Below is the detailed information for this Category Product.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Category Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name Category
                                        Products</label>
                                    <div class="col-sm-12 col-md-7">
                                        <p>{{ $category->name }}</p>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
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
