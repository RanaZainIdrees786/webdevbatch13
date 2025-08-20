@extends('web.master')
@section('content')
    @php
        $no_of_items = 0;
        $subtotal = 0;
        $discount = 0;
        $total = 0;
        $cart = session()->get('cart');
        if (isset($cart)) {
            $no_of_items = count($cart);
            foreach ($cart as $id => $details) {
                $subtotal += $details['price'] * $details['quantity'];
            }
            $discount = 15;
            $total = $subtotal * (1 - $discount / 100);
        }
    @endphp

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <form action="{{ route('web-place-order') }}" method="post">
        @csrf
        <input type="hidden" name="total" value="{{ $total }}">
        <div class="checkout_area section-padding-80">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-page-heading mb-30">
                                <h5>Billing Address</h5>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">First Name <span>*</span></label>
                                    <input type="text" class="form-control" name="firstname" id="first_name"
                                        value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Last Name <span>*</span></label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" value=""
                                        required>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                    <input name='address' type="text" class="form-control mb-3" id="street_address"
                                        value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input type="number" class="form-control" name='contact' id="phone_number"
                                        min="0" value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" name="email" class="form-control" id="email_address"
                                        value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                        <div class="order-details-confirmation">

                            <div class="cart-page-heading">
                                <h5>Your Order</h5>
                                <p>The Details</p>
                            </div>


                            <ul class="order-details-form mb-4">
                                <li><span>Product</span> <span>Total</span></li>
                                @if (isset($cart))
                                    @foreach ($cart as $id => $details)
                                        {{-- <li><span>Cocktail Yellow dress</span> <span>$59.90</span></li> --}}
                                        <li><span>{{ $details['name'] }}</span>
                                            <span>{{ $details['price'] * $details['quantity'] }}</span>
                                        </li>
                                    @endforeach
                                @endif
                                <li><span>Subtotal</span> <span>{{ $subtotal }}</span></li>
                                <li><span>Shipping</span> <span>Free</span></li>
                                <li><span>Discount</span> <span>{{ $discount }}%</span></li>
                                <li><span>Total</span> <span>{{ $total }}</span></li>
                            </ul>

                            <button type='submit' class="btn essence-btn">Place Order</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </form>
    <!-- ##### Checkout Area End ##### -->
@endsection
