@extends('app')                       
                            
@section('sidemenu_technology')                   
active                         
@endsection                         
@section('a','Admin')
@section('b','Bill')                        
@section('content')
<base src="{{asset("")}}">
    <section id="widget-grid">
        <div class="row">                           
        <article class="col-md-12">                         
            @box_open(trans("List Bill"))                         
                <div>                           
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
                                    <th style="text-align: center">Status</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bill as $b)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$b->id}}</td>
                                    <td>
                                        <?php 
                                            $customer = DB::table('customer')->where('id',$b->id_customer)->first();
                                        ?>
                                        @if(!empty($customer->name))
                                            {{$customer->name}}
                                        @endif
                                    </td>
                                    <td>{{$b->date_order}}</td>
                                    <td>{{number_format($b->total)}}đ</td>
                                    <td>{{$b->payment}}</td>                                    
                                    <td>{{$b->note}}</td>
                                    <td>
                                        @if($b->status ==0)
                                            <span style="color:#d35400;">Đơn hàng COD chưa xác nhận</span>                                                  
                                        @elseif($b->status==1)
                                            @if($b->type =='paypal' && $row->note !='' && $row->status==1)
                                            <span style="color:#d35400;">Đơn hàng đã thanh toán online</span>
                                            @else
                                                <span style="color:#27ae60;">Đơn hàng COD đã xác nhận</span>
                                            @endif                                              
                                        @elseif($b->status ==2)
                                            <span style="color:#CC0066;">Đơn hàng đang được giao</span>
                                        @elseif($b->status ==3)
                                            <span style="color:blue;">Đã giao hàng xong</span>
                                        @endif
                                    </td>                                                                     
                                    <td>
                                    {!! Form::open(["url" => "bill/$b->id", "method" => "GET"]) !!}
                                        <button type="submit" class="btn btn-sm btn-primary fa fa-list" title="Chi tiết"></button>
                                    {!! Form::close() !!}
                                    {{-- <a href="{{url('bill_detail/$b->id')}}" class="btn btn-sm btn-primary fa fa-edit" title="Chi tiết"></a> --}} 
                                    {!! Form::open(["url" => "bill/$b->id", "method" => "DELETE"]) !!}
                                        <button type="submit" class="btn btn-sm btn-danger fa fa-trash" title="Xóa" onclick="return confirm('Are you sure?')"></button>
                                    {!! Form::close() !!}
                                    </td>                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <div style="text-align: center;">{{$bill->links()}}</div>
                    </div>                                         
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