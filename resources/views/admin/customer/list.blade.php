@extends('app')                       
                            
@section('sidemenu_technology')                   
active                         
@endsection                         
@section('a','Admin')
@section('b','Customer')                        
@section('content')
<base src="{{asset("")}}">
    <section id="widget-grid">
        <div class="row">                           
        <article class="col-md-12">                         
            @box_open(trans("List Customer"))                         
                <div>                           
                    <div class="widget-body">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr align="center">
                                    <th style="text-align: center">ID</th>
                                    <th style="text-align: center">Name</th>
                                    <th style="text-align: center">Gender</th>
                                    <th style="text-align: center">Email</th>
                                    <th style="text-align: center">Address</th>
                                    <th style="text-align: center">Phone</th>
                                    <th style="text-align: center">Note</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 0 ?>
                                @foreach($customer as $c)
                                <?php $stt += 1 ?>
                                <tr class="odd gradeX" align="center">
                                    <td>{{$stt}}</td>
                                    <td>{{$c->name}}</td>
                                    <td>{{$c->gender}}</td>
                                    <td>{{$c->email}}</td>
                                    <td>{{$c->address}}</td>
                                    <td>{{$c->phone_number}}</td>
                                    <td>{{$c->note}}</td>                                                                       
                                    <td>
                                    {!! Form::open(["url" => "customer/$c->id", "method" => "DELETE"]) !!}
                                        <button type="submit" class="btn btn-sm btn-danger fa fa-trash" onclick="return confirm('Are you sure?')"></button>
                                    {!! Form::close() !!}
                                    <br>
                                    {{-- {!! Form::open(["url" => "type_product/$pt->id/edit", "method" => "GET"]) !!}
                                        <button type="submit" class="btn btn-sm btn-primary fa fa-edit"></button>
                                    {!! Form::close() !!} --}}
                                    </td>                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <div style="text-align: center;">{{$customer->links()}}</div>
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