@extends('app')                       
                            
@section('sidemenu_technology')                   
active                         
@endsection                         
@section('a','Admin')
@section('b','Product') 
@section('c','List')                        
@section('content')
<base src="{{asset("")}}">
    <section id="widget-grid">
    
        <div class="row">                           
        <article class="col-md-12">                         
            @box_open(trans("List Product"))                         
                <div>                           
                    <div class="widget-body">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr align="center">
                                    <th style="text-align: center">ID</th>
                                    <th style="text-align: center">Name</th>
                                    <th style="text-align: center">Image</th>
                                    <th style="text-align: center">Type Product</th>
                                    <th style="text-align: center">Unit Price</th>
                                    <th style="text-align: center">Sale Price</th>
                                    <th style="text-align: center">Unit</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 0 ?>
                                @foreach($product as $p)
                                <?php $stt += 1 ?>
                                <tr class="odd gradeX" align="center">
                                    <td>{{$p->id}}</td>
                                    <td>{{$p->name}}</td>
                                    <td><img src="public/source/image/product/{{$p->image}}" width="200" height="150"></td>
                                    <td>
                                        <?php 
                                            $cate = DB::table('type_products')->where('id',$p->id_type)->first();
                                        ?>
                                        @if(!empty($cate->name))
                                            {{$cate->name}}
                                        @endif
                                    </td>
                                    <td>{{number_format($p->unit_price)}}đ</td>
                                    <td>{{number_format($p->promotion_price)}}đ</td>
                                    <td>{{$p->unit}}</td>                                    
                                    <td>
                                    {!! Form::open(["url" => "product/$p->id", "method" => "DELETE"]) !!}
                                        <button type="submit" class="btn btn-sm btn-danger fa fa-trash" onclick="return confirm('Are you sure?')"></button>
                                    {!! Form::close() !!}
                                    <br>
                                    {!! Form::open(["url" => "product/$p->id/edit", "method" => "GET"]) !!}
                                        <button type="submit" class="btn btn-sm btn-primary fa fa-edit"></button>
                                    {!! Form::close() !!}
                                    </td>                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <div style="text-align: center;">{{$product->links()}}</div>
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