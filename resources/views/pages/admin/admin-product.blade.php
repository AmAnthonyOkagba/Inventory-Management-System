@extends('layouts.admin-base')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">Products</h1>
                <a class="btn btn-primary" href="{{route('admin.addproduct')}}">
                    Add
                </a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
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
                            All products
                        </div> --}}
                        <div class="panel-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                            @endif
                            <div class="card-body table-responsive table-sm p-0">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->regular_price}}</td>
                                                <td>{{$product->quantity}}</td>
                                                <td>
                                                    <a href="{{route('admin.editproduct',['id'=>$product->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                                    <a 
                                                    {{-- onclick="confirm('Are you sure, You want to delete this Product?') || event.stopImmediatePropagation()"  --}}
                                                    href="{{url('admin/deleteProduct/'.$product->id) }}" >
                                                        <i class="fa fa-times fa-2x text-danger ml-2"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {{$products->links()}} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection