@extends('layouts.admin-base')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">Orders</h1>
                {{-- <a class="btn btn-primary" href="{{route('admin.orders')}}">
                    Back
                </a> --}}
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<hr>

<div class="container">
    <div class="card">
        <div class="container">
            <div class="row pb-5">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        {{-- <div class="panel-heading">
                            All orders
                        </div> --}}
                        <div class="panel-body">
                            @if (Session::has('order_message'))
                                <div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
                            @endif
                            <div class="card-body table-sm table-responsive p-0">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Subtotal</th>
                                            <th>Total</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Order Date</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{$order->subtotal}}</td>
                                                <td>{{$order->total}}</td>
                                                <td>{{$order->firstname}} {{$order->lastname}}</td>
                                                <td>{{$order->phone}}</td>
                                                <td>{{$order->email}}</td>
                                                <td>{{$order->status}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn btn-primary">Details</a>  
                                                    <div class="dropdown">
                                                        @if ($order->status == "delivered")
                                                        <button class="btn btn-success">Delivery</button>
                                                        @elseif ($order->status == "canceled")
                                                            <button class="btn btn-danger">Cancelled</button>
                                                        @else
                                                            <button id="my-dropdown" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status</button>
                                                            <div class="dropdown-menu" aria-labelledby="my-dropdown">
                                                                <a class="dropdown-item" href="{{route('admin.update-order',['status'=>'delivered', 'id'=>$order->id])}}">
                                                                    Delivered
                                                                </a>
                                                                <a class="dropdown-item" href="{{route('admin.update-order',['status'=>'canceled', 'id'=>$order->id])}}">
                                                                    Canceled
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
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
    </div>
</div>

@endsection