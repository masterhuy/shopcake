@extends('master')
@section('title','Đăng nhập')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{ trans('home.đăng nhập') }}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="">{{ trans('home.trang chủ') }}</a> / <span>{{ trans('home.đăng nhập') }}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dangnhap')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					@if(Session::has('flag'))
						<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>{{ trans('home.đăng nhập') }}</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email <span style="color: red">*</span></label>
							<input type="email" name="email" required placeholder="Email Address">
						</div>
						<div class="form-block">
							<label for="phone">{{ trans('home.mật khẩu') }} <span style="color: red">*</span></label>
							<input type="password" name="password" required placeholder="">
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">{{ trans('home.đăng nhập') }}</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection