@extends('layouts.admin-base')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Product</h1>
                <a class="btn btn-primary pull-right" href="{{route('admin.products')}}">
                    Back
                </a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Product</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<hr>

<div class="container">
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        {{-- <div class="panel-heading">
                            All Products
                        </div> --}}
                        <div class="panel-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                            @endif
                            <form class="form-horizontal" action="{{ url('admin/update-product/'.$product->id) }}" method="POST" enctype="multipart/form-data" wire:submit.prevent="storeProduct">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}" wire:keyup="generateSlug">
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Regular Price</label>
                                        <input type="number" class="form-control" name="regular_price" value="{{ old('regular_price', $product->regular_price) }}">
                                        @error('regular_price')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Sale Price</label>
                                        <input type="number" class="form-control" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}">
                                        @error('sale_price')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" class="form-control" name="quantity" value="{{ old('quantity', $product->quantity) }}">
                                        @error('quantity')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
