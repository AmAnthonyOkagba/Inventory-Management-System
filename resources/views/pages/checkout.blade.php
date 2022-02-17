@extends('layouts.base')

@section('content')

<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Checkout</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="/">Home</a></li>
                            <li class="ec-breadcrumb-item active">Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-checkout-leftside col-lg-8 col-md-12 ">
                <div class="ec-checkout-content">
                    <form action="{{url('placeOrder')}}" method="post">
                        @csrf
                    <div class="ec-checkout-inner">
                        <div class="ec-checkout-wrap margin-bottom-30 padding-bottom-3">
                            <div class="ec-checkout-block ec-check-bill">
                                <h3 class="ec-checkout-title">Billing Details</h3>
                                <div class="ec-bl-block-content">
                                    <div class="ec-check-subtitle">Checkout Options</div>
                                    <div class="ec-check-bill-form">
                                            <span class="">
                                                <span>
                                                    <input type="radio" id="bill1" name="COD">
                                                    <label for="bill1">Pay now</label>
                                                </span>
                                                <span>
                                                    <input type="radio" id="bill2" name="COD" checked>
                                                    <label for="bill2">Pay on Delivery</label>
                                                </span>
                                            </span><br><br>
                                            <span class="ec-bill-wrap ec-bill-half">
                                                <label>First Name*</label>
                                                <input type="text" name="firstname"
                                                    placeholder="Enter your first name" required />
                                                    @error('address')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                            </span>
                                            <span class="ec-bill-wrap ec-bill-half">
                                                <label>Last Name*</label>
                                                <input type="text" name="lastname"
                                                    placeholder="Enter your last name" required />
                                            </span>
                                            <span class="ec-bill-wrap">
                                                <label>Address</label>
                                                <input type="text" name="address" placeholder="Address Line" />
                                            </span>
                                            <span class="ec-bill-wrap ec-bill-half">
                                                <label>email</label>
                                                <input type="text" name="email" placeholder="Email" />
                                            </span>
                                            <span class="ec-bill-wrap ec-bill-half">
                                                <label>phone</label>
                                                <input type="text" name="phone" placeholder="Phone" />
                                            </span>
                                        </div>
                                        
                                    </div>
                                </div>

                        </div>
                        <span class="ec-check-order-btn">
                            <button class="btn btn-primary">Place Order</button>
                        </span>
                    </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


@endsection
