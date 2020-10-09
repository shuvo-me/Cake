@extends('front_end.master')

@section('content')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Shopping cart</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{url('/')}}">Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                               @foreach ($items as $item)
                               <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                    <img src="{{$item->item_image}}" alt="{{$item->item_name}}">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>{{$item->item_name}}</h6>
                                        <h5>{{$item->price}}</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                        <input type="text" value="{{$item->quantity}}">
                                        </div>
                                    </div>
                                </td>
                            <td class="cart__price">{{$item->quantity*$item->price}}</td>
                                <td class="cart__close"><span class="icon_close"></span></td>
                            </tr>
                               @endforeach

                            </tbody>
                        </table>
                    </div>
                    @php
                        $amount = 0;
                        foreach($items as $item){
                                $amount = $amount+($item->price*$item->quantity);
                        }
                    @endphp
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>{{$amount}}</span></li>
                            <li>Total <span>{{$amount}}</span></li>
                        </ul>
                        <a href="{{url('/checkout')}}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection
