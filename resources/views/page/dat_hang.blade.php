@extends('master')
@section('title','Đặt hàng')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{ trans('home.đặt hàng') }}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{url('/')}}">{{ trans('home.trang chủ') }}</a> / <span>{{ trans('home.đặt hàng') }}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>

<div class="container">
	<div id="content">
		
		<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="row">@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif</div>
			<div class="row">
				<div class="col-sm-6">
					<h4>{{ trans('home.đặt hàng') }}</h4>
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label for="name">{{ trans('home.họ tên') }} <span style="color: red">*</span></label>
						<input type="text" name="name" placeholder="" required>
					</div>
					<div class="form-block">
						<label>{{ trans('home.giới tính') }} </label>
						<input id="gender" type="radio" class="input-radio" name="gender" value="Nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">{{ trans('home.nam') }}</span>
						<input id="gender" type="radio" class="input-radio" name="gender" value="Nữ" style="width: 10%"><span>{{ trans('home.nữ') }}</span>			
					</div>

					<div class="form-block">
						<label for="email">Email <span style="color: red">*</span></label>
						<input type="email" id="email" name="email" required placeholder="expample@gmail.com">
					</div>

					<div class="form-block">
						<label for="adress">{{ trans('home.địa chỉ') }} <span style="color: red">*</span></label>
						<input type="text" id="address" name="address" placeholder="" required>
					</div>
					

					<div class="form-block">
						<label for="phone">{{ trans('home.số điện thoại') }} <span style="color: red">*</span></label>
						<input type="text" id="phone" name="phone" required>
					</div>
					
					<div class="form-block">
						<label for="notes">{{ trans('home.ghi chú') }}</label>
						<textarea id="notes" name="notes"></textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>{{ trans('home.đơn hàng của bạn') }}</h5></div>
						<div class="your-order-body" style="padding: 0px 10px">
							<div class="your-order-item">
								<div>
								
								@foreach(Cart::content() as $cart)
								<!--  one item	 -->
									<div class="media">
										<img width="25%" src="{!!url('public/source/image/product/'.$cart->options->img)!!}" alt="" class="pull-left">
										<div class="media-body">
											@if(App::getLocale() == "vi")
												<p class="font-large">{{$cart->name}}</p><br>
											@else
												<p class="font-large">{{$cart->options->trans_name}}</p><br>
											@endif
											<span class="your-order-info">{{ trans('home.đơn giá') }}: {{number_format($cart->price)}} {{ trans('home.đồng') }}</span><br>
											<span class="your-order-info">{{ trans('home.số lượng') }}: {{-- {{$cart->qty}} --}}
												@if (($cart->qty) >1)
						                            <a href="{!!url('gio-hang/update/'.$cart->rowId.'/'.$cart->qty.'-down')!!}"><span class="glyphicon glyphicon-minus"></span></a> 
						                        @else
						                            <a href="#"><span class="glyphicon glyphicon-minus"></span></a> 
						                        @endif
						                          	{{-- <input type="text" class="qty text-center" value=" {!!$cart->qty!!}" style="width:30px; font-weight:bold; font-size:15px; color:blue;" readonly="readonly">  --}}
						                          	<input type="text" name="" value="{{$cart->qty}}" style="width: 50px">
						                        <a href="{!!url('gio-hang/update/'.$cart->rowId.'/'.$cart->qty.'-up')!!}"><span class="glyphicon glyphicon-plus-sign"></span></a>
											</span>
										</div>
									</div>
								<!-- end one item -->
								@endforeach
								

								{{-- @if(Session::has('cart'))
								@foreach($product_cart as $cart)
								<!--  one item	 -->
									<div class="media">
										<img width="25%" src="public/source/image/product/{{$cart['item']['image']}}" alt="" class="pull-left">
										<div class="media-body">
											@if(\App::getLocale() == "vi")
												<p class="font-large">{{$cart['item']['name']}}</p><br>
											@else
												<p class="font-large">{{$cart['item']['trans_name']}}</p><br>
											@endif
											<span class="your-order-info">{{ trans('home.đơn giá') }}: {{number_format($cart['price'])}} {{ trans('home.đồng') }}</span>
											<span class="your-order-info">{{ trans('home.số lượng') }}: {{$cart['qty']}}</span>
										</div>
									</div>
								<!-- end one item -->
								@endforeach
								@endif --}}
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left"><p class="your-order-f18">{{ trans('home.tổng tiền') }}:</p></div>
								<div class="pull-right"><h5 class="color-black">{{Cart::subtotal(0,',','.')}} {{ trans('home.đồng') }}</h5></div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="your-order-head"><h5>{{ trans('home.hình thức thanh toán') }}</h5></div>
						
						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">{{ trans('home.thanh toán khi nhận hàng') }} </label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										{{ trans('home.cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng') }}
									</div>						
								</li>

								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
									<label for="payment_method_cheque">{{ trans('home.chuyển khoản') }} </label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										{{ trans('home.Chuyển tiền đến tài khoản sau') }}:
										<br>- {{ trans('home.Số tài khoản') }}: 123 456 789
										<br>- {{ trans('home.Chủ TK') }}: {{ trans('home.Nguyễn Quang Huy') }}
										<br>- {{ trans('home.Ngân hàng Techcombank, Văn Quán, Hà Đông, TP.Hà Nội') }}
									</div>						
								</li>
								
							</ul>
						</div>

						<div class="text-center"><button type="submit" class="beta-btn primary" href="#">{{ trans('home.đặt hàng') }}<i class="fa fa-chevron-right"></i></button></div>
					</div> <!-- .your-order -->
				</div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection