@extends('layouts.admin-base')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">Order Details</h1>
                <a class="btn btn-primary" href="{{route('admin.orders')}}">
                    Back
                </a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Order Details </li>
                </ol>
            </div>
        </div>
    </div>
</section>

<hr>

<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Order Details</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-sm">
                    <tr>
                        <th>Order Id</th>
                        <td>{{$order->id}}</td>
                        <th>Order Date</th>
                        <td>{{$order->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{$order->status}}</td>
                        @if ($order->status == "delivered")
                        <th>Delivery Date</th>
                        <td>{{$order->delivered_date}}</td>
                        @elseif ($order->status == "canceled")
                        <th>Cancellation Date</th>
                        <td>{{$order->canceled_date}}</td>
                        @else
                        <th>Order Status</th>
                        <td>Pending</td>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ordered Item</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-sm table-responsive p-0">
                        <table class="table table-hover table-bordered text-nowrap">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderItems as $item)
                                <tr>
                                    <td>
                                        <h4><a href="{{route('product.details',['id'=>$item->product->id])}}">{{$item->product->name}}</a></h4>
                                    </td>
                                    <td>₦{{$item->price}}</td>
                                    <td><span class="tag tag-success">{{$item->quantity}}</span></td>
                                    <td>₦{{$item->price * $item->quantity}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <hr> --}}
                        <div class="summary pt-3">
                            <div class="container order-summary">
                                <h4>Order Summary</h4>
                                <p class="class"><span>Tax</span><b class="float-right">₦{{$order->tax}}</b></p>
                                <p class="class"><span>Subtotal</span><b class="float-right">₦{{$order->subtotal}}</b></p>
                                <p class="class"><span>Total</span><b class="float-right">₦{{$order->total}}</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Billing Details</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-sm">
                    <tr>
                        <th>First Name</th>
                        <td>{{$order->firstname}}</td>
                        <th>Last Name</th>
                        <td>{{$order->lastname}}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{$order->phone}}</td>
                        <th>Email</th>
                        <td>{{$order->email}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$order->address}}</td>
                        <th>State</th>
                        <td>{{$order->state}}</td>
                    </tr>
                </table>
            </div>
          </div>

    </div>

</section>

@endsection