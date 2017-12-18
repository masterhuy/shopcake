@extends('app')                       
                            
@section('sidemenu_technology')                   
active                         
@endsection                         
@section('a','Admin')
@section('b','User') 
@section('c','Add')                        
@section('content')                         
    <section id="widget-grid">
        <div class="row">                           
        <article class="col-md-6">                         
            @box_open(trans("Add User"))                         
                <div>                           
                    <div class="widget-body">
                        {!! Form::open(["url" => "user", "method" => "post", "files" => true]) !!}
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" required placeholder="" value="{{old('txtUser')}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" required placeholder="" value="{{old('txtEmail')}}"/>
                            </div>
                             <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="txtPass" required placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>RePassword</label>
                                <input type="password" class="form-control" name="txtRePass" required placeholder="" />
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        {!! Form::close() !!}
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
						
