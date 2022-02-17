@extends('layouts.admin-base')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">Add New Product</h1>
                <a class="btn btn-primary pull-right" href="{{route('admin.products')}}">
                    Back
                </a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">New Products</li>
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
                            <form class="form-horizontal" action="{{url('admin/store-product')}} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control" placeholder="Product Name" name="name" value="{{ old('name')}}">
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Regular Price</label>
                                        <input type="number" class="form-control" placeholder="Regular Price" name="regular_price" value="{{ old('regular_price')}}" >
                                        @error('regular_price')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Sale Price</label>
                                        <input type="number" class="form-control" placeholder="Sale Price" name="sale_price" value="{{ old('sale_price')}}" >
                                        @error('sale_price')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" class="form-control" placeholder="Quantity" name="quantity" value="{{ old('quantity')}}" >
                                        @error('quantity')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
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
