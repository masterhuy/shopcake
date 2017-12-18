@extends('app')                       
                            
@section('sidemenu_technology')                   
active                         
@endsection                         
@section('a','Admin')
@section('b','Product Type') 
@section('c','List')                        
@section('content')
<base src="{{asset("")}}">
    <section id="widget-grid">
        <div class="row">                           
        <article class="col-md-12">                         
            @box_open(trans("List Product Type"))                         
                <div>                           
                    <div class="widget-body">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr align="center">
                                    <th style="text-align: center">ID</th>
                                    <th style="text-align: center">Name</th>
                                    <th style="text-align: center">Image</th>
                                    <th style="text-align: center">Description</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 0 ?>
                                @foreach($producttype as $pt)
                                <?php $stt += 1 ?>
                                <tr class="odd gradeX" align="center">
                                    <td>{{$stt}}</td>
                                    <td>{{$pt->name}}</td>
                                    <td><img src="public/source/image/product/{{$pt->image}}" width="200" height="150"></td>
                                    <td>{{$pt->description}}</td>                                    
                                    <td>
                                    {!! Form::open(["url" => "type_product/$pt->id", "method" => "DELETE"]) !!}
                                        <button type="submit" class="btn btn-sm btn-danger fa fa-trash" onclick="return confirm('Are you sure?')"></button>
                                    {!! Form::close() !!}
                                    <br>
                                    {!! Form::open(["url" => "type_product/$pt->id/edit", "method" => "GET"]) !!}
                                        <button type="submit" class="btn btn-sm btn-primary fa fa-edit"></button>
                                    {!! Form::close() !!}
                                    </td>                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <div style="text-align: center;">{{$producttype->links()}}</div>
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