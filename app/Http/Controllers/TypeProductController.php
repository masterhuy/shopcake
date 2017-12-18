<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Models\Media;
use App\Product;
use DB;

class TypeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttype = DB::table('type_products')->paginate(10);
        return view('admin.typeproduct.list',['producttype'=>$producttype]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.typeproduct.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producttype       = new ProductType;
        $producttype->name = $request->txtName;
        $file = $request->file('name');             
        if (strlen($file) > 0) {
            $filename = time().'.'.$file->getClientOriginalName();
            $destinationPath = 'public/source/image/product/';
            $file->move($destinationPath,$filename);
            $producttype->image = $filename;
        }
        $producttype->description = $request->txtDescription;
        $producttype->save();
        return redirect('type_product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producttype = ProductType::findOrFail($id);
        return view('admin.typeproduct.edit',['producttype'=>$producttype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producttype = ProductType::findOrFail($id);
        $producttype->name = $request->txtName;
        $file = $request->file('fImage');
        if (strlen($file) > 0) {
            $fImageCurrent = $request->fImageCurrent;
            if (file_exists(public_path().'public/source/image/product/'.$fImageCurrent)) {
                File::delete(public_path().'public/source/image/product/'.$fImageCurrent);
            }

            $filename        = time().'.'.$file->getClientOriginalName();
            $destinationPath = 'public/source/image/product/';
            $file->move($destinationPath,$filename);
            $producttype->image = $filename;
        }
        $producttype->description = $request->txtDescription;
        $producttype->save();
        return redirect()->route('type_product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $producttype = ProductType::findOrFail($id);
        // $producttype->delete();
        // return redirect('type_product');

        $id_type = Product::where('id_type',$id)->count();
        if($id_type == 0){
            $producttype = ProductType::find($id);
            $producttype->delete();

            return redirect()->route('type_product.index');
        } else {
            echo '<script type="text/javascript">
                alert("Bạn không được phép xóa danh mục này");
                window.location = "';
                echo route('type_product.index');
            echo '"
            </script>';
        }
    }
}
