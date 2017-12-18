@extends('master')
@section('title','Loại sản phẩm')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				@if(\App::getLocale() == "vi")
					<h6 class="inner-title">{{$loai_sp->name}}</h6>
				@else
					<h6 class="inner-title">{{$loai_sp->trans_name}}</h6>
				@endif
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="">{{ trans('home.trang chủ') }}</a> / <span>{{ trans('home.loại sản phẩm') }}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<ul class="aside-menu">
					@foreach($loai as $l)
						@if(\App::getLocale() == "vi")
							<li><a href="loai-san-pham/{{$l->id}}-{{$l->alias}}">{{$l->name}}</a></li>
						@else
							<li><a href="loai-san-pham/{{$l->id}}-{{$l->alias}}">{{$l->trans_name}}</a></li>
						@endif
					@endforeach
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4>{{ trans('home.sản phẩm mới') }} </h4>
						<div class="beta-products-details">
							<p class="pull-left">{{count($sp_theoloai)}} {{ trans('home.sản phẩm') }}</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
						@foreach($sp_theoloai as $sp)
							<div class="col-sm-4 add1">
								<div class="single-item">
									@if(($sp->unit_price)-($sp->promotion_price)!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="chi-tiet-san-pham/{{$sp->id}}-{{$sp->alias}}"><img src="public/source/image/product/{{$sp->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										@if(\App::getLocale() == "vi")
											<p class="single-item-title">{{$sp->name}}</p>
										@else
											<p class="single-item-title">{{$sp->trans_name}}</p>
										@endif
										<p class="single-item-price" style="font-size: 18px">
										@if(($sp->unit_price)-($sp->promotion_price) == 0)
											<span class="flash-sale">{{number_format($sp->unit_price)}} {{ trans('home.đồng') }}</span>
										@else
											<span class="flash-del">{{number_format($sp->unit_price)}} {{ trans('home.đồng') }}</span>
											<span class="flash-sale">{{number_format($sp->promotion_price)}} {{ trans('home.đồng') }}</span>
										@endif
										</p>
									</div>
									<div class="single-item-caption add2">
										<a class="add-to-cart pull-left" href="{!!url('gio-hang/addcart/'.$sp->id)!!}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="chi-tiet-san-pham/{{$sp->id}}-{{$sp->alias}}">{{ trans('home.chi tiết')}} <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>{{ trans('home.sản phẩm khác') }}</h4>
						<div class="beta-products-details">
							<p class="pull-left">{{count($sp_khac)}} {{ trans('home.sản phẩm') }}</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
						@foreach($sp_khac as $sp_k)
							<div class="col-sm-4">
								<div class="single-item">
									@if($sp_k->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="chi-tiet-san-pham/{{$sp_k->id}}-{{$sp_k->alias}}"><img src="public/source/image/product/{{$sp_k->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										@if(\App::getLocale() == "vi")
											<p class="single-item-title">{{$sp_k->name}}</p>
										@else
											<p class="single-item-title">{{$sp_k->trans_name}}</p>
										@endif
										<p class="single-item-price" style="font-size: 18px">
										@if($sp_k->promotion_price !=0)
											<span class="flash-del">{{number_format($sp_k->unit_price)}} {{ trans('home.đồng') }}</span>
												<span class="flash-sale">{{number_format($sp_k->promotion_price)}} {{ trans('home.đồng') }}</span>
										@else
										<span>{{number_format($sp_k->unit_price)}} {{ trans('home.đồng') }}</span>
										@endif
										</p>
									</div>
									<div class="single-item-caption add2">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp_k->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="chi-tiet-san-pham/{{$sp_k->id}}-{{$sp_k->alias}}">{{ trans('home.chi tiết') }} <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
						<div class="row" style="text-align: center;">{{$sp_khac->links()}}</div>
						<div class="space40">&nbsp;</div>
						
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection