@extends('app')
@section('title','SmartAdmin of Master Huy')
@section('a','Admin')
@section('b','Dashboard')
@section('content')
<link href="{{ asset('public/back-end/css/datepicker3.css') }}" rel="stylesheet">
{{-- <link href="{{ asset('public/back-end/css/styles.css') }}" rel="stylesheet"> --}}
<style type="text/css" media="screen">
/**/
    .panel-widget .glyph {
    stroke-width: 2px;
    }
    .no-padding {
    padding: 0; margin: 0;
    }
    .widget-left {
    height: 80px;
    padding-top: 15px;
    text-align: center;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}

.widget-right {
    text-align: left;
    line-height: 1.6em;
    margin: 0px;
    padding: 20px;
    height: 80px;
    color: #999;
    font-weight: 300;
    background: #fff;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}

@media (max-width: 768px) {
    .widget-right {
    width: 100%;
    margin: 0;
    text-align: center;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    }
}

@media (max-width: 768px) {
    .widget-left {
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
    }
}

.widget-right .text-muted {
    color: #9fadbb;
}
.widget-right .large {
    color: #5f6468;
}

.panel-blue .widget-left { background: #30a5ff; color: #fff; }
.panel-teal .widget-left { background: #1ebfae; color: #fff; }
.panel-orange .widget-left { background: #ffb53e; color: #fff; }
.panel-red .widget-left { background: #f9243f; color: #fff; }

.panel-widget {
    background: #fff;
}
.large {
    font-size: 2em;
}

.text-muted {
    color: #9fadbb;
}
.easypiechart {
    position: relative;
    text-align: center;
    width: 120px;
    height: 120px;
    margin: 20px auto 10px auto;
}
.easypiechart .percent {
    display: block;
    position: absolute;
    font-size: 26px;
    top: 38px;
    width: 120px;
}
.container.fix{
	width: 1115px;
}
#easypiechart-blue .percent { color: #30a5ff;}
#easypiechart-teal .percent { color: #1ebfae;}
#easypiechart-orange .percent { color: #ffb53e;}
#easypiechart-red .percent { color: #ef4040;}
</style>
<div class="container fix">
    <div class="row">
        <div class="col-md-11 {{-- col-md-offset-2 --}}">
            {{-- start --}}
            <div class="panel panel-default">
                {{-- <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Welcome to Admin area Huy's Shop!<br>
                    <br>
                    Have a good day!
                </div> --}}

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="text-align: center;">Dashboard</h1>
                    </div>
                </div><!--/.row-->
                
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-3">
                        <div class="panel panel-blue panel-widget">
                            <div class="row no-padding">
                                <div class="col-sm-3 col-lg-5 widget-left">
                                    <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"/></svg>
                                </div>
                                <div class="col-sm-9 col-lg-7 widget-right">
                                    <div class="large">{{-- {!!$oder!!} --}}1</div>
                                    <div class="text-muted"> Tổng đơn hàng</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-3">
                        <div class="panel panel-red panel-widget ">
                            <div class="row no-padding">
                                <div class="col-sm-3 col-lg-5 widget-left">
                                    <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"/></svg>
                                </div>
                                <div class="col-sm-9 col-lg-7 widget-right">
                                    <div class="large">{{-- {!!$oder_new!!} --}}2</div>
                                    <div class="text-muted"> Đơn hàng mới</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-3">
                        <div class="panel panel-orange panel-widget">
                            <div class="row no-padding">
                                <div class="col-sm-3 col-lg-5 widget-left">
                                    <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"/></svg>
                                </div>
                                <div class="col-sm-9 col-lg-7 widget-right">
                                    <div class="large">{{-- {!!$pro!!} --}}3</div>
                                    <div class="text-muted">Sản phẩm</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-3">
                        <div class="panel panel-teal panel-widget">
                            <div class="row no-padding">
                                <div class="col-sm-3 col-lg-5 widget-left">
                                    <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                                </div>
                                <div class="col-sm-9 col-lg-7 widget-right">
                                    <div class="large">{{-- {!!$mem!!} --}}4</div>
                                    <div class="text-muted">Khách hàng</div>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div><!--/.row-->
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Tổng quan trang cửa hàng</div>
                            <div class="panel-body">
                                <div class="canvas-wrapper">
                                    <canvas class="main-chart" id="line-chart" height="100" width="600"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.row-->
                
                <div class="row">
                    <div class="col-xs-6 col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-body easypiechart-panel">
                                <h4>Đơn hàng mới</h4>
                                <div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">92%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-body easypiechart-panel">
                                <h4>Đánh giá mới</h4>
                                <div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">65%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-body easypiechart-panel">
                                <h4>Khách hàng mới</h4>
                                <div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent">56%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-body easypiechart-panel">
                                <h4>Lượt truy cập</h4>
                                <div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent">27%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.row-->
                                    
            </div>
            {{-- end --}}
        </div>
    </div>
</div>

<script src="{{ asset('public/back-end/js/lumino.glyphs.js') }}"></script>

<script src="{{ asset('public/back-end/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('public/back-end/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/back-end/js/chart.min.js') }}"></script>
<script src="{{ asset('public/back-end/js/chart-data.js') }}"></script>
<script src="{{ asset('public/back-end/js/easypiechart.js') }}"></script>
<script src="{{ asset('public/back-end/js/easypiechart-data.js') }}"></script>
<script src="{{ asset('public/back-end/js/bootstrap-datepicker.js') }}"></script> 
<script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
            $(this).find('em:first').toggleClass("glyphicon-minus");      
        }); 
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
      if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
      if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>   

@endsection
