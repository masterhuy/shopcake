@extends('master')
@section('title','Tìm kiếm')
@section('content')
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>{{ trans('home.tìm kiếm') }}</h4>
						<div class="beta-products-details">
							<p class="pull-left">{{ trans('home.tìm thấy') }} {{count($product)}} {{ trans('home.sản phẩm') }}</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
						@foreach($product as $new)
							<div class="col-sm-3 add1">
								<div class="single-item">
								@if(($new->unit_price)-($new->promotion_price) != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
								@endif
									<div class="single-item-header">
										<a href="chi-tiet-san-pham/{{$new->id}}-{{$new->alias}}"><img src="public/source/image/product/{{$new->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										@if(\App::getLocale() == "vi")
											<p class="single-item-title">{{$new->name}}</p>
										@else
											<p class="single-item-title">{{$new->trans_name}}</p>
										@endif
										<p class="single-item-price" style="font-size: 18px">
										@if(($new->unit_price)-($new->promotion_price) == 0)
											<span class="flash-sale">{{number_format($new->unit_price)}}đ</span>
										@else
											<span class="flash-del">{{number_format($new->unit_price)}}đ</span>
											<span class="flash-sale">{{number_format($new->promotion_price)}}đ</span>
										@endif
										</p>
									</div>
									<div class="single-item-caption add2">
										<a class="add-to-cart pull-left" href="{!!url('gio-hang/addcart/'.$new->id)!!}""><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="chi-tiet-san-pham/{{$new->id}}-{{$new->alias}}">{{ trans('home.chi tiết') }}<i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
						<div class="row" style="text-align: center;">{{$product->links()}}</div>
					</div> <!-- .beta-products-list -->
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->
		</div> <!-- .main-content -->
	</div> <!-- #content -->
@endsection