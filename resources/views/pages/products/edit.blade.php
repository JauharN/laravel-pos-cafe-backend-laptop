@extends('layouts.app')

@section('title', 'Edit Product')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Product</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></div>
                    <div class="breadcrumb-item">Edit Product</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Product Form</h2>
                <p class="section-lead">Update product data.</p>

                @include('layouts.alert')

                <div class="card">
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Product</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" name="category" value="{{ old('category', $product->category) }}"
                                    class="form-control @error('category') is-invalid @enderror">
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" value="{{ old('price', $product->price) }}"
                                    class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                                    class="form-control @error('stock') is-invalid @enderror">
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Photo</label>
                                @if ($product->image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/products/' . $product->image) }}" width="150"
                                            class="img-thumbnail">
                                    </div>
                                @endif
                                <input type="file" name="image"
                                    class="form-control-file @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
