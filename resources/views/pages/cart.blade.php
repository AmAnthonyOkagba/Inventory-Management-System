@extends('layouts.base')

@section('content')

<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Cart</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="/">Home</a></li>
                            <li class="ec-breadcrumb-item active">Cart</li>
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
            @if (Session::has('success_message'))
                <div class="alert alert-success">
                    <strong>{{Session::get('success_message')}}</strong>
                </div>
            @endif
            @if (Cart::count() > 0)
            <div class="ec-cart-leftside col-lg-8 col-md-12 ">
                <div class="ec-cart-content">
                    <div class="ec-cart-inner">
                        <div class="row">
                            <form action="#">
                                <div class="table-content cart-table-content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th style="text-align: center;">Quantity</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (Cart::content() as $item)
                                                <tr>
                                                    <td data-label="Product" class="ec-cart-pro-name">
                                                        <a href="{{route('product.details',['id'=>$item->model->id])}}">
                                                            <img class="ec-cart-pro-img mr-4" src="{{ ('assets/images/product-image') }}/{{$item->model->image}}" alt="{{$item->model->name}}" />
                                                            {{$item->model->name}}
                                                        </a>
                                                    </td>
                                                    <td data-label="Price" class="ec-cart-pro-price">
                                                        {{-- <span class="amount">$56.00</span> --}}
                                                        @if ($item->model->sale_price > 0)
                                                        <span class="amount">₦{{$item->model->sale_price}}</span><br>
                                                            <del>₦{{$item->model->regular_price}}</del>
                                                        @else
                                                        <span class="amount">₦{{$item->model->regular_price}}</span>
                                                        @endif
                                                    </td>
                                                    <td data-label="Quantity" class="ec-cart-pro-qty" style="text-align: center;">
                                                        {{$item->qty}}
                                                    </td>
                                                    <td data-label="Total" class="ec-cart-pro-subtotal">₦{{$item->subtotal}}</td>
                                                    <td data-label="Remove" class="ec-cart-pro-remove">
                                                        <form action="{{url('cart', $item->rowId)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button><i class="ecicon eci-trash-o fa-2x"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ec-cart-update-bottom">
                                            <a href="{{ route('shop')}}">Continue Shopping</a>
                                            <a href="{{ route('checkout')}}" class="btn btn-primary">Check Out</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--cart content End -->
            </div>
            <!-- Sidebar Area Start -->
            <div class="ec-cart-rightside col-lg-4 col-md-12">
                <div class="ec-sidebar-wrap">
                    <!-- Sidebar Summary Block -->
                    <div class="ec-sidebar-block">
                        <div class="ec-sb-title">
                            <h3 class="ec-sidebar-title">Summary</h3>
                        </div>
                        <div class="ec-sb-block-content">
                            <h4 class="ec-ship-title">Estimate Shipping</h4>
                            <div class="ec-cart-form">
                                <p>Enter your destination to get a shipping estimate</p>
                                <form action="#" method="post">
                                    <span class="ec-cart-wrap">
                                        <label>Country *</label>
                                        <span class="ec-cart-select-inner">
                                            <select name="ec_cart_country" id="ec-cart-select-country"
                                                class="ec-cart-select">
                                                <option selected="" disabled="">United States</option>
                                                <option value="1">Country 1</option>
                                                <option value="2">Country 2</option>
                                                <option value="3">Country 3</option>
                                                <option value="4">Country 4</option>
                                                <option value="5">Country 5</option>
                                            </select>
                                        </span>
                                    </span>
                                    <span class="ec-cart-wrap">
                                        <label>State/Province</label>
                                        <span class="ec-cart-select-inner">
                                            <select name="ec_cart_state" id="ec-cart-select-state"
                                                class="ec-cart-select">
                                                <option selected="" disabled="">Please Select a region, state
                                                </option>
                                                <option value="1">Region/State 1</option>
                                                <option value="2">Region/State 2</option>
                                                <option value="3">Region/State 3</option>
                                                <option value="4">Region/State 4</option>
                                                <option value="5">Region/State 5</option>
                                            </select>
                                        </span>
                                    </span>
                                    <span class="ec-cart-wrap">
                                        <label>Zip/Postal Code</label>
                                        <input type="text" name="postalcode" placeholder="Zip/Postal Code">
                                    </span>
                                </form>
                            </div>
                        </div>

                        <div class="ec-sb-block-content">
                            <div class="ec-cart-summary-bottom">
                                <div class="ec-cart-summary">
                                    <div>
                                        <span class="text-left">Sub-Total</span>
                                        <span class="text-right">₦{{Cart::subtotal()}}</span>
                                    </div>
                                    <div>
                                        <span class="text-left">Delivery Charges</span>
                                        <span class="text-right">₦{{Cart::tax()}}</span>
                                    </div>
                                    <div>
                                        <span class="text-left">Coupan Discount</span>
                                        <span class="text-right"><a class="ec-cart-coupan">Apply Coupan</a></span>
                                    </div>
                                    <div class="ec-cart-coupan-content">
                                        <form class="ec-cart-coupan-form" name="ec-cart-coupan-form" method="post"
                                            action="#">
                                            <input class="ec-coupan" type="text" required=""
                                                placeholder="Enter Your Coupan Code" name="ec-coupan" value="">
                                            <button class="ec-coupan-btn button btn-primary" type="submit"
                                                name="subscribe" value="">Apply</button>
                                        </form>
                                    </div>
                                    <div class="ec-cart-summary-total">
                                        <span class="text-left">Total Amount</span>
                                        <span class="text-right">₦{{Cart::total()}}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            {{-- <tbody> --}}
            <div class="col-sm-12 text-center">
                <p class="col-sm-12">No item in cart</p>
                <a href="{{url('/shop')}}" class="theme-btn-1 btn btn-primary btn-effect-1">Continue Shopping</a>
            </div>
            {{-- </tbody> --}}
            @endif
        </div>
    </div>
</section>

{{-- <section class="section ec-new-product section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">New Arrivals</h2>
                    <h2 class="ec-title">New Arrivals</h2>
                    <p class="sub-title">Browse The Collection of Top Products</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                <div class="ec-product-inner">
                    <div class="ec-pro-image-outer">
                        <div class="ec-pro-image">
                            <a href="" class="image">
                                <img class="main-image"
                                    src="assets/images/product-image/6_1.jpg" alt="Product" />
                                <img class="hover-image"
                                    src="assets/images/product-image/6_2.jpg" alt="Product" />
                            </a>
                            <span class="percentage">20%</span>
                            <a href="#" class="quickview" data-link-action="quickview"
                                title="Quick view" data-bs-toggle="modal"
                                data-bs-target="#ec_quickview_modal"><img
                                    src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                    alt="" /></a>
                            <div class="ec-pro-actions">
                                <a href="compare.html" class="ec-btn-group compare"
                                    title="Compare"><img src="assets/images/icons/compare.svg"
                                        class="svg_img pro_svg" alt="" /></a>
                                <button title="Add To Cart" class=" add-to-cart"><img
                                        src="assets/images/icons/cart.svg" class="svg_img pro_svg"
                                        alt="" /> Add To Cart</button>
                                <a class="ec-btn-group wishlist" title="Wishlist"><img
                                        src="assets/images/icons/wishlist.svg"
                                        class="svg_img pro_svg" alt="" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="ec-pro-content">
                        <h5 class="ec-pro-title"><a href="">Round Neck T-Shirt</a></h5>
                        <div class="ec-pro-rating">
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star"></i>
                        </div>
                        <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                        <span class="ec-price">
                            <span class="old-price">$27.00</span>
                            <span class="new-price">$22.00</span>
                        </span>
                        <div class="ec-pro-option">
                            <div class="ec-pro-color">
                                <span class="ec-pro-opt-label">Color</span>
                                <ul class="ec-opt-swatch ec-change-img">
                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                            data-src="assets/images/product-image/6_1.jpg"
                                            data-src-hover="assets/images/product-image/6_1.jpg"
                                            data-tooltip="Gray"><span
                                                style="background-color:#e8c2ff;"></span></a></li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                            data-src="assets/images/product-image/6_2.jpg"
                                            data-src-hover="assets/images/product-image/6_2.jpg"
                                            data-tooltip="Orange"><span
                                                style="background-color:#9cfdd5;"></span></a></li>
                                </ul>
                            </div>
                            <div class="ec-pro-size">
                                <span class="ec-pro-opt-label">Size</span>
                                <ul class="ec-opt-size">
                                    <li class="active"><a href="#" class="ec-opt-sz"
                                            data-old="$25.00" data-new="$20.00"
                                            data-tooltip="Small">S</a></li>
                                    <li><a href="#" class="ec-opt-sz" data-old="$27.00"
                                            data-new="$22.00" data-tooltip="Medium">M</a></li>
                                    <li><a href="#" class="ec-opt-sz" data-old="$35.00"
                                            data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 shop-all-btn"><a href="{{ route('shop')}}">Shop All Collection</a></div>
        </div>
    </div>
</section> --}}

@endsection
