@extends('layouts.app')

@section('title', 'Orders')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Orders</h1>
                <div class="section-header-button">
                    <a href="{{ route('orders.create') }}" class="btn btn-primary">Add Order</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Orders</a></div>
                    <div class="breadcrumb-item">All Orders</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Orders</h2>
                <p class="section-lead">
                    You can manage all orders, including editing, deleting, and more.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Action For Selected</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Delete Permanently</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <form action="{{ route('orders.index') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="px-3 pt-2 text-center">
                                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                            data-checkbox-role="dad" class="custom-control-input"
                                                            id="checkbox-all">
                                                        <label for="checkbox-all"
                                                            class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th class="px-3">Products</th>
                                                <th class="px-3">Category</th>
                                                <th class="px-3">Author</th>
                                                {{-- <th class="px-3">Phone Number</th> --}}
                                                <th class="px-3">Date</th>
                                                <th class="px-3 address-column">Address</th> <!-- Apply class to th -->
                                                <th class="px-3">Guard</th>
                                                <th class="px-3">Subdistrict</th>
                                                <th class="px-3">Regency</th>
                                                <th class="px-3">Province</th>
                                                <th class="px-3">Status</th>
                                                <th class="px-3">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td class="px-3 pt-2 text-center">
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup"
                                                                class="custom-control-input"
                                                                id="checkbox-{{ $order->id }}">
                                                            <label for="checkbox-{{ $order->id }}"
                                                                class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td class="px-3">{{ $order->product->name }}</td>
                                                    <td class="px-3">{{ $order->product->category->name }}</td>
                                                    <td class="px-3">{{ $order->name }}</td>
                                                    {{-- <td class="px-3">{{ $order->phone_number }}</td> --}}
                                                    <td class="px-3">{{ $order->created_at->format('Y-m-d') }}</td>
                                                    <td class="px-3 address-column" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="{{ $order->address }}">
                                                        {{ $order->address }}
                                                    </td>
                                                    <td class="px-3">{{ $order->guard }}</td>
                                                    <td class="px-3">{{ $order->subdistrict }}</td>
                                                    <td class="px-3">{{ $order->regency }}</td>
                                                    <td class="px-3">{{ $order->province }}</td>

                                                    <td class="px-3">
                                                        <div class="badge badge-{{ $order->status->getBadgeClass() }}">
                                                            {{ $order->status->name }}
                                                        </div>
                                                    </td>
                                                    <td class="px-3">
                                                        <a href="{{ route('orders.show', $order->id) }}"
                                                            class="btn btn-info">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('orders.edit', $order->id) }}"
                                                            class="btn btn-warning">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('orders.destroy', $order->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

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
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
@endpush
