@extends('app')                       
                            
@section('sidemenu_technology')                   
active                         
@endsection                         
@section('a','Admin')
@section('b','Bill Detail')                        
@section('content')
{{-- <base src="{{asset("")}}"> --}}
    <section id="widget-grid">
        <div class="row">                           
        <article class="col-md-12">                         
            @box_open(trans("List Bill Detail"))                         
                <div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @elseif (Session()->has('flash_level'))
                    <div class="alert alert-success">
                        <ul>
                            {!! Session::get('flash_massage') !!}   
                        </ul>
                    </div>
                @endif                           
                    <div class="widget-body">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr align="center">
                                   <th style="text-align: center">ID</th>
                                    <th style="text-align: center">Customer</th>
                                    <th style="text-align: center">Date Order</th>
                                    <th style="text-align: center">Total</th>
                                    <th style="text-align: center">Payment</th>
                                    <th style="text-align: center">Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX" align="center">
                                    <td>{{$bill->id}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$bill->date_order}}</td>
                                    <td>{{number_format($bill->total)}}đ</td>
                                    <td>{{$bill->payment}}</td>
                                    <td>{{$bill->note}}</td>                          
                                    {{-- <td>
                                    {!! Form::open(["url" => "bill/$bill->id", "method" => "DELETE"]) !!}
                                        <button type="submit" class="btn btn-sm btn-danger fa fa-trash" onclick="return confirm('Are you sure?')"></button>
                                    {!! Form::close() !!}
                                    <br>
                                    </td>  --}}                                   
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p><b>* Chi tiết sản phẩm trong đơn hàng</b></p> 
                    <div class="widget-body">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr align="center">
                                   <th style="text-align: center">ID</th>
                                    <th style="text-align: center">Hình ảnh</th>
                                    <th style="text-align: center">Tên sản phẩm</th>
                                    <th style="text-align: center">Số lượng</th>
                                    <th style="text-align: center">Trạng thái</th>
                                    <th style="text-align: center">Giá</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX" align="center">
                                    <td>{{$bill_detail->id}}</td>
                                    <td><img src="{!!asset('public/source/image/product/'.$product->image)!!}" width="200" height="150"></td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$bill_detail->quantity}}</td>
                                    <td>
                                        @if($bill_detail->status ==1)
                                            <span style="color:blue;">Còn hàng</span>
                                        @else
                                            <span style="color:#27ae60;"> Tạm hết</span>
                                        @endif
                                    </td>
                                    <td>{{number_format($bill->total)}}đ</td>                          
                                    <td>
                                    {!! Form::open(["url" => "bill_detail/$bill_detail->id", "method" => "DELETE"]) !!}
                                        <button type="submit" class="btn btn-sm btn-danger fa fa-trash" onclick="return confirm('Are you sure?')"></button>
                                    {!! Form::close() !!}
                                    <br>
                                    </td>                                    
                                </tr>
                            </tbody>
                        </table>
                    </div> 

                    <div class="control-group {{ $errors->has('sltlevel') ? ' has-error' : '' }}">
                    <label  for="input-id" class="control-label"><b>* Chọn thao tác muốn thực hiện </b></label>
                    {!! Form::open(["url" => "bill/$bill->id", "method" => "PUT"]) !!}
                    <div class="controls">
                        <div >
                            <select name="sltlevel" id="inputSltCate" class="form-control" style="width: 30%">
                                <option value="0" @if($bill->status ==0) selected @endif>-- Chưa xác nhận --</option>   
                                <option value="1" @if($bill->status ==1) selected @endif>-- Đã xác nhận--</option>      
                                <option value="2" @if($bill->status ==2) selected @endif>-- Đang giao hàng --</option> 
                                <option value="3" @if($bill->status ==3) selected @endif>-- Đã giao hàng xong --</option>      
                            </select>
                        </div>
                    </div>
                    <br>
                    <button type="submit" onclick="return xacnhan('Bạn có chắc chắn thực hiện hành động này ?')"  class="btn btn-primary"> Thực hiện hành động </button>
                    {!! Form::close() !!}
                    <div class="space10">&nbsp;</div>
                </div>                          
            @box_close                          
        </article>                          
    </div>                     
    </section>                      
@endsection                         
                            
@push('script')                         
@endpush                            
                            
@push('css')                           
@endpush