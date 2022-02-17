@extends('layouts.base')

@section('content')

<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Product Details</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="/">Home</a></li>
                            <li class="ec-breadcrumb-item active">Product Details</li>
                            <li class="ec-breadcrumb-item active"> {{$product->name}} </li>
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
            <div class="ec-pro-rightside ec-common-rightside col-lg-9 col-md-12">

                <div class="single-pro-block">
                    <div class="single-pro-inner">
                        <div class="row">
                            <div class="single-pro-img">
                                <div class="single-product-scroll">
                                    <div class="single-product-cover">
                                        <div class="single-slide zoom-image-hover">
                                            <img class="img-responsive" src="{{asset('assets/images/product-image')}}/{{$product->image}}"
                                                alt="{{$product->name}}">
                                        </div>
                                        <div class="single-slide zoom-image-hover">
                                            <img class="img-responsive" src="{{asset('assets/images/product-image')}}/{{$product->image}}"
                                                alt="{{$product->name}}">
                                        </div>
                                    </div>
                                    <div class="single-nav-thumb">
                                        <div class="single-slide">
                                            <img class="img-responsive" src="{{asset('assets/images/product-image')}}/{{$product->image}}"
                                                alt="{{$product->name}}">
                                        </div>
                                        <div class="single-slide">
                                            <img class="img-responsive" src="{{asset('assets/images/product-image')}}/{{$product->image}}"
                                                alt="{{$product->name}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-pro-desc">
                                <div class="single-pro-content">
                                    <h5 class="ec-single-title">{{$product->name}}</h5>

                                    <div class="ec-single-price-stoke">
                                        <div class="ec-single-price">
                                            <span class="ec-single-ps-title">As low as</span>
                                            @if ($product->sale_price > '0')
                                                <del class="old-price">₦{{$product->regular_price}}</del>
                                                <span class="new-price">₦{{$product->sale_price}}</span>
                                            @else
                                                <span class="new-price">₦{{$product->regular_price}}</span>
                                            @endif
                                        </div>
                                    </div>

                                    
                                    <form action="{{route('cart')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <input type="hidden" name="name" value="{{$product->name}}">
                                        <input type="hidden" name="price" value="
                                        <?php
                                            if ($product->sale_price > 0)
                                            echo $product->sale_price;
                                            else
                                            echo $product->regular_price;
                                        ?>">
                                    <div class="ec-single-qty">
                                        <div class="qty-plus-minus">
                                            <input class="qty-input" type="text" name="qty" value="1" />
                                        </div>
                                        <div class="ec-single-cart ">
                                            <button class="btn btn-primary">Add To Cart</button>
                                        </div>
                                        </form>
                                        <div class="ec-single-wishlist">
                                            <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                    src="{{asset('assets/images/icons/wishlist.svg')}}" class="svg_img pro_svg"
                                                    alt="" /></a>
                                        </div>
                                        <div class="ec-single-quickview">
                                            <a href="#" class="ec-btn-group quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#ec_quickview_modal"><img
                                                    src="{{asset('assets/images/icons/quickview.svg')}}" class="svg_img pro_svg"
                                                    alt="" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
