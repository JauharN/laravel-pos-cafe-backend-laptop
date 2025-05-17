@extends('layouts.app')

@section('title', 'Products')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Products</h1>
                <div class="section-header-button">
                    <a href="{{ route('product.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Products</div>
                </div>
            </div>

            <div class="section-body">
                @include('layouts.alert')

                <h2 class="section-title">Manage Products</h2>
                <p class="section-lead">Edit, delete, and search your products easily.</p>

                <div class="card">
                    <div class="card-header">
                        <h4>All Products</h4>
                        <div class="card-header-form">
                            <form method="GET" action="{{ route('product.index') }}">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="name"
                                        value="{{ request('name') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Photo</th>
                                        <th>Stock</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                                            <td>
                                                @if ($product->image)
                                                    <img src="{{ asset('storage/products/' . $product->image) }}" width="60"
                                                        class="img-thumbnail">
                                                @else
                                                    <span class="badge badge-danger">No Image</span>
                                                @endif
                                            </td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ route('product.edit', $product->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>

                                                <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                                    class="d-inline-block"
                                                    onsubmit="return confirm('Are you sure want to delete this item?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No Products Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer text-right">
                            {{ $products->withQueryString()->links() }}
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
