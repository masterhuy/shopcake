@extends('app')                       
                            
@section('sidemenu_technology')                   
active                         
@endsection                         
@section('a','Admin')
@section('b','Type Product') 
@section('c','Edit')                        
@section('content')
<base href="{{asset('')}}">                         
    <section id="widget-grid">
        <div class="row">                           
        <article class="col-md-6">                         
            @box_open(trans("Edit Type Product"))                         
                <div>                           
                    <div class="widget-body">
                        {!! Form::open(["url" => "type_product/$producttype->id", "method" => "PUT", "files" => true]) !!}
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" required placeholder="" value="{{$producttype->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Image Current</label>
                                <p>
                                    <img src="public/source/image/product/{{$producttype->image}}" width="200px" name="fImageCurrent">
                                </p>
                            </div>
                            @include('custom.file_input', ['name' => 'fImage', 'title' => 'Image Edit']) 
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control ckeditor" rows="5" name="txtDescription" required>{{$producttype->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
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
						
