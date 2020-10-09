@extends('front_end.master')

@section('content')
     <!-- Breadcrumb Begin -->
     <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{url('/place_the_order')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                            here</a> to enter your code</h6>
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p> Name<span>*</span></p>
                                        <input name="name" type="text">
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p> Date<span>*</span></p>
                                        <input name="shipping_date" type="date">
                                    </div>

                                </div>

                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input name="country" type="text">
                            </div>
                            <div class="checkout__input">
                                <p>City<span>*</span></p>
                                <input name="city" type="text">
                            </div>

                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input name="address" type="text" placeholder="Street Address" class="checkout__input__add">

                            </div>


                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input name="post_code" type="text">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input name="phone" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input name="email" type="email">
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input name="order_note" type="text"
                                placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        @php
                            $amount = 0;
                            foreach($items as $item){
                                $amount = $amount+($item->price*$item->quantity);
                            }
                        @endphp
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h6 class="order__title">Your order</h6>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">

                                    @foreach ($items as $item)

                                       <li><samp>01.</samp> {{$item->item_name}} <span>{{$item->price*$item->quantity}} Tk.</span></li>
                                    @endforeach


                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span>{{$amount}} Tk.</span></li>
                                    <li>Total <span>{{$amount}} Tk.</</span></li>
                                </ul>


                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Stripe
                                        <input name="check_method" value="Stripe" type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Cash On Delivery
                                        <input name="check_method" value="Cash On Delivery" type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>


                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection



