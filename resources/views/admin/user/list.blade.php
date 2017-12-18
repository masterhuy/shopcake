@extends('app')                       
                            
@section('sidemenu_technology')                   
active                         
@endsection                         
@section('a','Admin')
@section('b','User') 
@section('c','List')                        
@section('content')                         
    <section id="widget-grid">
        <div class="row">                           
        <article class="col-md-12">                         
            @box_open(trans("List User"))                         
                <div>                           
                    <div class="widget-body">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr align="center">
                                    <th style="text-align: center">ID</th>
                                    <th style="text-align: center">Name</th>
                                    <th style="text-align: center">Email</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 0 ?>
                                @foreach($user as $u)
                                <?php $stt += 1 ?>
                                <tr class="odd gradeX" align="center">
                                    <td>{{$stt}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    @if($u->id == 1)
                                    <td>No Action</td>
                                    @else
                                    <td>
                                    {!! Form::open(["url" => "user/$u->id", "method" => "DELETE"]) !!}
                                        <button type="submit" class="btn btn-sm btn-danger fa fa-trash" onclick="return confirm('Are you sure?')"></button>
                                    {!! Form::close() !!}
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <div style="text-align: center;">{{$user->links()}}</div>
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