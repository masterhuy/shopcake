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
                        {!! Form::open(["url" => "product/$product->id", "method" => "PUT", "files" => true]) !!}
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" required placeholder="" value="{{$product->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Image Current</label>
                                <p>
                                    <img src="public/source/image/product/{{$product->image}}" width="200px" name="fImageCurrent">
                                </p>
                            </div>
                            @include('custom.file_input', ['name' => 'fImage', 'title' => 'Image Edit'])
                            <div>
                                <label>Type Product</label>
                                <select class="form-control" name="sltType">
                                    @foreach($producttype as $pt)
                                        <option 
                                            @if($product['id_type'] == $pt['id'])
                                                {{'selected'}}
                                            @endif
                                        value="{{$pt['id']}}" >{{$pt['name']}}</option>                                
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Unit Price</label>
                                <input class="form-control" name="txtUnitPrice" required placeholder="" value="{{$product->unit_price}}" />
                            </div>
                            <div class="form-group">
                                <label>Promotion Price</label>
                                <input class="form-control" name="txtPromotionPrice" required placeholder="" value="{{$product->promotion_price}}" />
                            </div>
                            <div class="form-group">
                                <label>Unit</label>
                                <input class="form-control" name="txtUnit" required placeholder="" value="{{$product->unit}}" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control ckeditor" rows="5" name="txtDescription" required>{{$product->description}}</textarea>
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
						
