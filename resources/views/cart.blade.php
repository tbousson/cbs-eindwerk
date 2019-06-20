@extends('layouts.home')

@section('content')

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-01.jpg);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Comic</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
						</tr>
						@foreach($cart as $item)
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="{{$item->photo ? asset($item->photo->url) : 'http://placehold.it/400x400'}}" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2">{{$item->name}}</td>
							<td class="column-3">{{$item->price}}</td>
							<td class="column-4">
								<div class="">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up btn btn-sm btn-primary" href="{{url("cart?comic_id=$item->id&increment=1")}}" class=""> + </a>
										<input class="cart_quantity_input pl-3" type="text" name="quantity" value="{{ $item->qty }}" autocomplete="off" size="2">
										<a class="cart_quantity_down btn btn-sm btn-primary" href="{{url("cart?comic_id=$item->id&decrease=1")}}"> - </a>
									</div>
									{{-- <a class="btn-num-product-down color1 flex-c-m size7 bg8 eff2" {{url("cart?comic_id=$item->id&increment=1")}}>
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</a>

									<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="{{$item->qty}}">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button> --}}
								</div>
							</td>
							<td class="column-5">{{($item->price * $item->qty)}}</td>
						</tr>
						@endforeach
						
					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<a href="{{route("clear_cart")}}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Clear Cart
					</a>
				</div>
			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						{{Cart::subtotal()}}
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping:
					</span>

					<div class="w-size20 w-full-sm">
						<p class="s-text8 p-b-23">
							Free shipping!
						</p>

						<span class="s-text19">
							Shipping Address:
						</span>

						<div class="s-text20 text-capitalize">
							{{Auth::user()->address}} <br> {{Auth::user()->postcode}} {{Auth::user()->city}}
						</div>

						<div class="s-text20 text-capitalize">
						{{Auth::user()->country}}
						</div>

						

						
					</div>
				</div>

				<!--  -->
				<form method="post" id="payment-form" action="{{url('checkout')}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<section>
						<label for="amount">
							<span class="input-label">Amount</span>
							<div class="input-wrapper amount-wrapper">
								<input id="amount" name="amount" type="tel" min="1" placeholder="Amount"
									   value="{{Cart::subTotal()}}">

							</div>
						</label>
						<div class="bt-drop-in-wrapper">
							<div id="bt-dropin"></div>
						</div>
					</section>
					<input id="nonce" name="payment_method_nonce" type="hidden" />
					<button class="btn btn-primary" type="submit">Complete Order</button>
				</form>
			</div>
		</div>
	</section>
@endsection
@section('js')

<script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
<script>
    var form = document.querySelector('#payment-form');
    var client_token = "{{$token}}";
    braintree.dropin.create({
        authorization: client_token,
        selector: '#bt-dropin',
        paypal: {
            flow: 'vault'
        }
    }, function (createErr, instance) {
        if (createErr) {
            console.log('Create Error', createErr);
            return;
        }
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                }
                // Add the nonce to the form and submit
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
            });
        });
    });
</script>
@endsection
