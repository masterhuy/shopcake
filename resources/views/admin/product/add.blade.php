@extends('app')                       
                            
@section('sidemenu_technology')                   
active                         
@endsection                         
@section('a','Admin')
@section('b','Product') 
@section('c','Add')                        
@section('content')                         
    <section id="widget-grid">
        <div class="row">                           
        <article class="col-md-6">                         
            @box_open(trans("Add Product"))                         
                <div>                           
                    <div class="widget-body">
                        {!! Form::open(["url" => "product", "method" => "post", "files" => true]) !!}
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" required placeholder="" value="{{old('txtName')}}" />
                            </div>
                            @include('custom.file_input', ['name' => 'fImage', 'title' => 'Image'])
                            <div>
                                <label>Type Product</label>
                                <select class="form-control" name="sltType">
                                    @foreach($producttype as $pt)
                                        <option value="{{$pt->id}}">{{$pt->name}}</option>                                
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Unit Price</label>
                                <input class="form-control" name="txtUnitPrice" required placeholder="" value="{{old('txtUnitPrice')}}" />
                            </div>
                            <div class="form-group">
                                <label>Promotion Price</label>
                                <input class="form-control" name="txtPromotionPrice" required placeholder="" value="{{old('txtPromotionPrice')}}" />
                            </div>
                            <div class="form-group">
                                <label>Unit</label>
                                <input class="form-control" name="txtUnit" required placeholder="" value="{{old('txtUnit')}}" />
                            </div>
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
						
