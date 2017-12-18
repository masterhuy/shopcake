@extends('master')
@section('title','Welcome to Shop of Huy ')
@section('content')
<div class="fullwidthbanner-container">
	<div class="fullwidthbanner">
		<div class="bannercontainer">
	    <div class="banner" >
				<ul>
				@foreach($slide as $sl)
					<!-- THE FIRST SLIDE -->
					<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
		            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
						<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="public/source/image/slide/{{$sl->image}}" data-src="public/source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('public/source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
						</div>
					</div>
		        </li>
		        @endforeach
				</ul>
			</div>
		</div>
		<div class="tp-bannertimer"></div>
	</div>
</div>
<!--slider-->
</div>
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>{{ trans('home.sản phẩm mới') }}</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{ trans('home.tìm thấy') }} {{count($new_product)}} {{ trans('home.sản phẩm') }}</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($sanpham_khuyenmai as $spkm)
								<div class="col-sm-3 add1">
									<div class="single-item">
									@if(($spkm->unit_price)-($spkm->promotion_price) != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="chi-tiet-san-pham/{{$spkm->id}}-{{$spkm->alias}}"><img src="public/source/image/product/{{$spkm->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											@if(\App::getLocale() == "vi")
												<p class="single-item-title">{{$spkm->name}}</p>
											@else
												<p class="single-item-title">{{$spkm->trans_name}}</p>
											@endif
											<p class="single-item-price"  style="font-size: 18px">
											@if(($spkm->unit_price)-($spkm->promotion_price) == 0)
												<span class="flash-sale">{{number_format($spkm->unit_price)}}đ</span>
											@else
												<span class="flash-del">{{number_format($spkm->unit_price)}}đ</span>
												<span class="flash-sale">{{number_format($spkm->promotion_price)}}đ</span>
											@endif
											</p>
										</div>
										<div class="single-item-caption add2">
											<a class="add-to-cart pull-left" href="{!!url('gio-hang/addcart/'.$spkm->id)!!}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chi-tiet-san-pham/{{$spkm->id}}-{{$spkm->alias}}">{{ trans('home.chi tiết') }} <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach	
							</div>
							{{-- <div class="row" style="text-align: center;">{{$new_product->links()}}</div> --}}
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>{{ trans('home.sản phẩm đặc biệt') }}</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{ trans('home.tìm thấy') }} {{count($sanpham_khuyenmai)}} {{ trans('home.sản phẩm') }}</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							
							@foreach($new_product as $new)
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
											<a class="add-to-cart pull-left" href="{!!url('gio-hang/addcart/'.$new->id)!!}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chi-tiet-san-pham/{{$new->id}}-{{$new->alias}}">{{ trans('home.chi tiết') }} <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach
							</div>
							<a class="btn-top" href="javascript:void(0);" title="Top" style="display: inline;"></a>
							{{-- <div class="row">{{$sanpham_khuyenmai->links()}}</div> --}}
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection