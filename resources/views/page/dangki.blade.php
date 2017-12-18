@extends('master')
@section('title','Đăng ký')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{ trans('home.đăng kí') }}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="">{{ trans('home.trang chủ') }}</a> / <span>{{ trans('home.đăng kí') }}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content">	
			<form action="{{route('dangki')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					@if(count($errors)>0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
							{{$err}}
							@endforeach
						</div>
					@endif
					@if(Session::has('thanhcong'))
						<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>{{ trans('home.đăng kí') }}</h4>
						<div class="space20">&nbsp;</div>
						<div class="form-block">
							<label for="email">Email <span style="color: red">*</span></label>
							<input type="email" name="email" required placeholder="example@mail.com">
						</div>
						<div class="form-block">
							<label for="your_last_name">{{ trans('home.họ tên') }} <span style="color: red">*</span></label>
							<input type="text" name="fullname" required >
						</div>

						<div class="form-block">
							<label for="adress">{{ trans('home.địa chỉ') }} <span style="color: red">*</span></label>
							<input type="text" name="address" required>
						</div>
						<div class="form-block">
							<label for="phone">{{ trans('home.số điện thoại') }} <span style="color: red">*</span></label>
							<input type="text" name="phone" required>
						</div>
						<div class="form-block">
							<label for="phone">{{ trans('home.mật khẩu') }} <span style="color: red">*</span></label>
							<input type="password" name="password" required>
						</div>
						<div class="form-block">
							<label for="phone">{{ trans('home.nhập lại mật khẩu') }} <span style="color: red">*</span></label>
							<input type="password" name="re_password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">{{ trans('home.đăng kí') }}</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection