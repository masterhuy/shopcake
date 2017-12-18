@extends('app')                       
                            
@section('sidemenu_technology')                   
active                         
@endsection                         
@section('a','Admin')
@section('b','Type Product') 
@section('c','Add')                        
@section('content')                         
    <section id="widget-grid">
        <div class="row">                           
        <article class="col-md-6">                         
            @box_open(trans("Add Type Product"))                         
                <div>                           
                    <div class="widget-body">
                        {!! Form::open(["url" => "type_product", "method" => "post", "files" => true]) !!}
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" required placeholder="" value="{{old('txtUser')}}" />
                            </div>
                            @include('custom.file_input', ['name' => 'name', 'title' => 'Image']) 
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control ckeditor" rows="5" name="txtDescription" required></textarea>
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
						
