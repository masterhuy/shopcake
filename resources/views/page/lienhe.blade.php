@extends('master')
@section('title','Liên hệ')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{ trans('home.liên hệ') }}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="">{{ trans('home.trang chủ') }}</a> / <span>{{ trans('home.liên hệ') }}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6264.113831602688!2d105.82265408221588!3d21.00608689812864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac8122e04105%3A0x22c29da21d3ce4d3!2zMTM5IEtoxrDGoW5nIFRoxrDhu6NuZywgVHJ1bmcgTGnhu4d0LCDEkOG7kW5nIMSQYSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1495424239743" width="600" height="450" frameborder="0" style="border:0" ></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>{{ trans('home.mẫu liên hệ') }}</h2>
					<div class="space20">&nbsp;</div>
					<p>{{ trans('home.bạn có thể liên hệ với chúng tôi theo mẫu sau') }}:</p>
					<div class="space20">&nbsp;</div>
					<form action="lien-he" method="post">
					<input type="hidden" name="_token" value="{{csrf_token()}}">	
						<div class="form-block">
							<input name="name" type="text" placeholder="{{ trans('home.họ tên') }} ({{ trans('home.bắt buộc') }})" required="">
						</div>
						<div class="form-block">
							<input name="email" type="email" placeholder="Email ({{ trans('home.bắt buộc') }})" required="">
						</div>
						<div class="form-block">
							<input name="subject" type="text" placeholder="{{ trans('home.tiêu đề') }}">
						</div>
						<div class="form-block">
							<textarea name="message" placeholder="{{ trans('home.lời nhắn của bạn') }}..."></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">{{ trans('home.gửi tin nhắn') }} <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>{{ trans('home.thông tin liên hệ') }}</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title"></h6>
					<p>
						<span class="glyphicon glyphicon-home"></span><i>  139 Khương Thượng - Đống Đa - Hà Nội</i><br>
						<span class="glyphicon glyphicon-envelope"></span><i> masterhuy@gmail.com</i><br>
						<span class="glyphicon glyphicon-phone-alt"></span><i> (+84) 975766675</i>
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection