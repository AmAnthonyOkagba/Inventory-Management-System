@extends('layouts.base')

@section('content')

<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Shop</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="/">Home</a></li>
                            <li class="ec-breadcrumb-item active">Shop</li>
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
            <div class="ec-shop-rightside col-lg-12 col-md-12 order-lg-last order-md-first margin-b-30">
                <div class="ec-pro-list-top d-flex">
                    <b class="text-center">ALL PRODUCTS</b>
                </div>

                <div class="shop-pro-content">
                    <div class="shop-pro-inner">
                        <div class="row">
                            @if ($products->count()>0)
                            @foreach ($products as $product)
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                <div class="ec-product-inner">
                                    <div class="ec-pro-image-outer">
                                        <div class="ec-pro-image">
                                            <a href="{{route('product.details',['id'=>$product->id])}}" class="image">
                                                <img class="main-image" src="assets/images/product-image/{{$product->image}}" alt="{{$product->name}}" />
                                                <img class="hover-image" src="assets/images/product-image/{{$product->image}}" alt="{{$product->name}}" />
                                            </a>
                                            <div class="ec-pro-actions">
                                                <form action="{{route('cart')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$product->id}}">
                                                    <input type="hidden" name="name" value="{{$product->name}}">
                                                    <input type="hidden" name="qty" value="1">
                                                    <input type="hidden" name="price" value="
                                                    <?php
                                                        if ($product->sale_price > 0)
                                                        echo $product->sale_price;
                                                        else
                                                        echo $product->regular_price;
                                                    ?>">
                                                    <button title="Add To Cart" class=" add-to-cart">
                                                        <img src="assets/images/icons/cart.svg" class="svg_img pro_svg" alt="" />
                                                         Add To Carts
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ec-pro-content">
                                        <h5 class="ec-pro-title"><a href="{{route('product.details',['id'=>$product->id])}}">{{$product->name}}</a></h5>
                                        
                                        <div class="ec-pro-list-desc">{{$product->short_description}}</div>
                                        <span class="ec-price">
                                            @if ($product->sale_price > '0')
                                                <span class="old-price">₦{{$product->regular_price}}</span>
                                                <span class="new-price">₦{{$product->sale_price}}</span>
                                            @else
                                                <span class="new-price">₦{{$product->regular_price}}</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <p class=" pt-10">No Products</p>
                            @endif

                        </div>
                    </div>
                    {{$products->links()}}
                    <hr>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
