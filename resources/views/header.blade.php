@if(session('thongbao'))
	<div class="col-md-4"></div>
    <div class="alert alert-success col-md-4" style="text-align: center;">
        <span class="glyphicon glyphicon-ok"></span> {{ trans('home.Sản phẩm đã được thêm vào giỏ hàng') }}
    </div>
    <div class="col-md-4"></div>
@endif
{{-- <div class="alert alert-success" style="display: none">
    <span class="glyphicon glyphicon-ok"></span> Sản phẩm đã được thêm vào giỏ hàng
</div> --}}
</style>
<base href="{{asset('')}}">
<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 139 {{ trans('home.khương thượng') }}, {{ trans('home.đống đa') }}, {{ trans('home.hà nội') }}</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0975766675</a></li>
					</ul>
				</div>
				<div class="dropdown pull-right">
				  	<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
					  	@if(\App::getLocale() == "vi")
							<img src="public/source/image/vi.png" width="20px" height="12px"> Tiếng Việt (VI)
			            @else
			            	<img src="public/source/image/en.png" width="20px" height="12px"> English (US)
			            @endif
				  		<span class="caret"></span>
				  	</button>
				  	<ul class="dropdown-menu">
					    <li><a href="language/vi"><img src="public/source/image/vi.png" width="20px" height="12px" alt=""> Tiếng Việt (VI)</a></li>
					    <li><a href="language/en"><img src="public/source/image/en.png" width="20px" height="12px" alt=""> English (US)</a></li>
				  	</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
					@if(Auth::check())
						<li><a href="">{{trans('home.xin chào')}} <span style="font-weight: bold;">{{Auth::user()->name}}</span></a></li>
						<li><a href="{{route('dangxuat')}}"><span class="glyphicon glyphicon-log-out"></span> {{ trans('home.đăng xuất') }}</a></li>
					@else					
						{{-- <li><a href="{{route('dangki')}}">{{ trans('home.đăng kí') }}</a></li> --}}
						<li><a {{-- href="{{route('dangnhap')}}" --}} class="btn btn-primary btn-lg" data-toggle="modal" data-target="#dangnhap"><span class="glyphicon glyphicon-log-in"></span>  {{ trans('home.đăng nhập') }}</a></li>
					@endif
					</ul>
					
				</div>

				<!-- Modal dang nhap-->
				<div id="dangnhap" class="modal fade" role="dialog">
				  	<div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
					      	<div class="modal-header">
					        	<button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">{{ trans('home.thông tin đăng nhập') }}</h4> 
					    </div><br>
					    <div class="col-md-12 col-xs-12 social">
					      	<a href="{{url('redirect')}}" style="color: #fff">
					      		<button class="btn btn-facebook btn-block" style="background: #3b5998">				      
					      			{{ trans('home.đăng nhập bằng') }} Facebook
					      		</button>	
					      	</a>
					    </div>
					    <div class="space10">&nbsp;</div>
					    <div class="col-md-12 col-xs-12 social">
					      	<a href="{{url('redirect/gg')}}" style="color: #fff">
					      		<button class="btn btn-facebook btn-block" style="background: #d34836">				      
					      			{{ trans('home.đăng nhập bằng') }} Google
					    		</button>
					    	</a>
					    </div>
						<div class="space20">&nbsp;</div>
						<div style="text-align: center">----------{{ trans('home.hoặc') }}----------</div>
						<div class="space20">&nbsp;</div>
						<form class="form-horizontal" role="form" method="POST" action="{{ route('dangnhap') }}">
	                    {{ csrf_field() }}
	                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                            <label for="email" class="col-md-4 control-label">{{ trans('home.địa chỉ e-mail') }}</label>
	                            <div class="col-md-6">
	                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

	                                @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                            <label for="password" class="col-md-4 control-label">{{ trans('home.mật khẩu') }}</label>

	                            <div class="col-md-6">
	                                <input id="password" type="password" class="form-control" name="password" required>

	                                @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <div class="col-md-8 col-md-offset-4">
	                                <button type="submit" class="btn btn-primary">
	                                    {{ trans('home.đăng nhập') }}
	                                </button>

	                                <a class="btn btn-link" href="{{ route('password.request') }}">
	                                    {{ trans('home.quên mật khẩu') }}?
	                                </a>
	                                <p>{{ trans('home.chưa có tài khoản') }}?<a class="btn btn-link" href="{{ route('dangki') }}">{{ trans('home.đăng ký tại đây') }}</a></p>
	                            </div>
	                        </div>
	                    </form>
					    <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('home.đóng') }}</button>
					    </div>
					</div>

				</div>
				</div>				
				<div class="clearfix"></div>
				<div class="pull-right"></div>
			</div> <!-- .container -->
			
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="" id="logo"><img src="public/source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space20">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('search')}}">
					        <input type="text" value="" name="key" id="s" placeholder="{{ trans('home.bạn tìm gì') }}..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
					
						<div class="cart">
							<div class="{{-- beta-select --}}"><i class="fa fa-shopping-cart"></i> {{ trans('home.giỏ hàng') }}@if(Cart::count() > 0) <span class="badge">{{Cart::count()}}</span>@else <span class="badge"></span>@endif<i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
							@if(Cart::count() != 0)
							@foreach(Cart::content() as $product)
								<div class="cart-item">
									<a class="cart-item-delete" href="{!!url('/gio-hang/delete/'.$product->rowId)!!}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="{{-- {!! url('chi-tiet-san-pham/'.$product->id) !!} --}}chi-tiet-san-pham/{{$product->id}}-{{$product->options->alias}}"><img src="{!!url('public/source/image/product/'.$product->options->img)!!}" alt=""></a>
										<div class="media-body">
											@if(App::getLocale() == "vi")
												<span class="cart-item-title">{{$product->name}}</span>
											@else
												<span class="cart-item-title">{{$product->options->trans_name}}</span>
											@endif
											<span class="cart-item-amount">{{$product->qty}}*<span>{{number_format($product->price,0,',','.')}}đ</span></span>
										</div>
									</div>
								</div>
							@endforeach
								<div class="cart-caption">
									<div class="cart-total text-right">{{ trans('home.tổng tiền') }}: <span class="cart-total-value">{{Cart::subtotal(0,',','.')}} {{ trans('home.đồng') }}</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('giohang')}}" class="beta-btn primary text-center">{{ trans('home.chi tiết giỏ hàng') }} <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							@else
								{{ trans('home.trống') }}
							@endif
							</div>
						</div> <!-- .cart -->
					</div>
				</div>

				<div class="clearfix"></div>
			</div> <!-- .container -->
			</div>
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('index')}}">{{ trans('home.trang chủ') }}</a></li>
						<li><a href="#">{{ trans('home.loại sản phẩm') }}</a>
							<ul class="sub-menu">
								@foreach($loai_sp as $loai)
									@if(App::getLocale() == "vi")
										<li><a href="loai-san-pham/{{$loai->id}}-{{$loai->alias}}">{{$loai->name}}</a></li>
									@else
										<li><a href="loai-san-pham/{{$loai->id}}-{{$loai->alias}}">{{$loai->trans_name}}</a></li>
									@endif
								@endforeach
							</ul>
						</li>
						<li><a href="{{route('gioithieu')}}">{{ trans('home.giới thiệu') }}</a></li>
						<li><a href="{{route('lienhe')}}">{{ trans('home.liên hệ') }}</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->