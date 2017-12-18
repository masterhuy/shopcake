@extends('master')
@section('title','Chi tiết sản phẩm')
@section('content')

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.btn-number').click(function(e){
        e.preventDefault();
        
        var fieldName = $(this).attr('data-field');
        var type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if(type == 'minus') {
                var minValue = parseInt(input.attr('min')); 
                if(!minValue) minValue = 1;
                if(currentVal > minValue) {
                    input.val(currentVal - 1).change();
                } 
                if(parseInt(input.val()) == minValue) {
                    $(this).attr('disabled', true);
                }
    
            } else if(type == 'plus') {
                var maxValue = parseInt(input.attr('max'));
                if(!maxValue) maxValue = 99;
                if(currentVal < maxValue) {
                    input.val(currentVal + 1).change();
                }
                if(parseInt(input.val()) == maxValue) {
                    $(this).attr('disabled', true);
                }
    
            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function(){
       $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {
        
        var minValue =  parseInt($(this).attr('min'));
        var maxValue =  parseInt($(this).attr('max'));
        if(!minValue) minValue = 1;
        if(!maxValue) maxValue = 99;
        var valueCurrent = parseInt($(this).val());
        
        var name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        
        
    });
    $(".input-number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                 // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) || 
                 // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                     // let it happen, don't do anything
                     return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
    });
});
</script>

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				@if(\App::getLocale() == "vi")
					<h6 class="inner-title">{{$sanpham->name}}</h6>
				@else
					<h6 class="inner-title">{{$sanpham->trans_name}}</h6>
				@endif
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="">{{ trans('home.trang chủ') }}</a> / <span>{{ trans('home.thông tin chi tiết sản phẩm') }}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
						<div class="col-sm-4">
							<a href="public/source/image/product/{{$sanpham->image}}" target="_blank">
								<img src="public/source/image/product/{{$sanpham->image}}" alt="">
							</a>
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								@if(\App::getLocale() == "vi")
									<p class="single-item-title"><h2>{{$sanpham->name}}</h2></p>
								@else
									<p class="single-item-title"><h2>{{$sanpham->trans_name}}</h2></p>
								@endif
								<div class="space20">&nbsp;</div>
								<p class="single-item-price">{{ trans('home.đơn giá') }}:
									@if(($sanpham->unit_price)-($sanpham->promotion_price) == 0)
										<span class="flash-sale">{{number_format($sanpham->unit_price)}} {{ trans('home.đồng') }}</span>
									@else
										<span class="flash-del">{{number_format($sanpham->unit_price)}} {{ trans('home.đồng') }}</span>
										<span class="flash-sale">{{number_format($sanpham->promotion_price)}} {{ trans('home.đồng') }}</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								{{-- <p>{{$sanpham->description}}</p> --}}
							</div>
							<div class="space20">&nbsp;</div>

							<p>{{ trans('home.số lượng') }}:</p>
							
							<div class="row">
								<div class="col-md-4">														   
								   	<div class="input-group"> 
									   	<span class="input-group-btn">
									   		<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]"> 
									   			<span class="glyphicon glyphicon-minus"></span> 
									   		</button>    
									   	</span> 
								   	<input id="qty" name="quant[1]" class="form-control input-number" value="1" type="text" style="text-align: center"> 
								   		<span class="input-group-btn">    
								   			<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]"> 
								   				<span class="glyphicon glyphicon-plus"></span> 
								   			</button>    
								   		</span> 
								   	</div> 
								</div>
								<a class="add-to-cart addcart pull-left" data-id="{{$sanpham->id}}" href="javascript:void(0)"><i class="fa fa-shopping-cart"></i></a>
								{{-- <a class="add-to-cart pull-left" id="{{$sanpham->id}}" href="{!!url('gio-hang/order-now/'.$sanpham->id)!!}"><i class="fa fa-shopping-cart"></i></a> --}}
								{{-- <a href="{!!url('gio-hang/order-now/'.$sanpham->id)!!}" title="" class="btn btn-small btn-block btn-primary col-md-4" style="font-size: 20px;"><span class="glyphicon glyphicon-shopping-cart"></span> {{ trans('home.Đặt hàng ngay') }}</a> --}}
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">{{ trans('home.mô tả') }}</a></li>
						</ul>

						<div class="panel" id="tab-description">
							@if(\App::getLocale() == "vi")
								<p>{{$sanpham->description}}</p>
							@else
								<p>{{$sanpham->trans_description}}</p>
							@endif
						</div>
					</div>

					<div class="fb-comments" data-href="https://localhost/shop/chi-tiet-san-pham/{{$sanpham->id}}-{{$sanpham->alias}}" data-numposts="5"></div>
					{{-- <div class="space50">&nbsp;</div> --}}
					{{-- <div class="beta-products-list">
						<h4>Sản phẩm tương tự</h4>

						<div class="row">
						@foreach($sp_tuongtu as $sptt)
							<div class="col-sm-4 add1">
								<div class="single-item">
									@if(($sptt->unit_price)-($sptt->promotion_price)!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="product.html"><img src="public/source/image/product/{{$sptt->image}}" alt="" height="195px" width="265px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sptt->name}}</p>
										<p class="single-item-price" style="font-size: 18px">
											@if(($sptt->unit_price)-($sptt->promotion_price) == 0)
												<span class="flash-sale">{{number_format($sptt->unit_price)}} đồng</span>
											@else
												<span class="flash-del">{{number_format($sptt->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($sptt->promotion_price)}} đồng</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption add2">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$sptt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
						<div class="row" style="text-align: center;">{{$sp_tuongtu->links()}}</div>
					</div> <!-- .beta-products-list --> --}}
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">{{ trans('home.sản phẩm tương tự') }}</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
							@foreach($sp_tuongtu as $sp_tt)
								<div class="media beta-sales-item">
									<a class="pull-left" href="chi-tiet-san-pham/{{$sp_tt->id}}-{{$sp_tt->alias}}"><img src="public/source/image/product/{{$sp_tt->image}}" alt=""></a>
									<div class="media-body">
										@if(\App::getLocale() == "vi")
											{{$sp_tt->name}}
										@else
											{{$sp_tt->trans_name}}
										@endif
										<br>
										<span class="beta-sales-price">{{number_format($sp_tt->unit_price)}}đ</span>
									</div>
								</div>
							@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">{{ trans('home.sản phẩm mới') }}</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
							@foreach($sanpham_moi as $sp_m)
								<div class="media beta-sales-item">
									<a class="pull-left" href="chi-tiet-san-pham/{{$sp_m->id}}-{{$sp_m->alias}}"><img src="public/source/image/product/{{$sp_m->image}}" alt=""></a>
									<div class="media-body">
										@if(\App::getLocale() == "vi")
											{{$sp_m->name}}
										@else
											{{$sp_m->trans_name}}
										@endif
										<br>
										<span class="beta-sales-price">{{number_format($sp_m->unit_price)}}đ</span>
									</div>
								</div>
							@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>

		</div> <!-- #content -->
	</div> <!-- .container -->

	<div id="fb-root"></div>
	<script>
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=309269612844696";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>

{{-- <script type="text/javascript">
	$(document).ready(function() {
		$(".add-to-cart").click(function(event) {
			id = $("#id").val();
			qty = $("#qq").val();
			$.ajax({
				url: 'add-to-cart/'+id+'/'+qty+,
				type: 'GET',
				data: {id: 'id',qty:'qty'},
			})
			.done(function(data) {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});
	});
</script> --}}

@endsection


