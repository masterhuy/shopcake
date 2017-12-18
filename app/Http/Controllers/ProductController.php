<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use DB;
use App\BillDetail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$producttype = ProductType::all();
        $product = DB::table('products')->paginate(10);
        return view('admin.product.list',['product'=>$product,'producttype'=>$producttype]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producttype = ProductType::all();
        return view('admin.product.add',['producttype'=>$producttype]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$product       = new Product;
		$product->name = $request->txtName;
		$file          = $request->file('fImage');             
        if (strlen($file) > 0) {
            $filename = time().'.'.$file->getClientOriginalName();
            $destinationPath = 'public/source/image/product/';
            $file->move($destinationPath,$filename);
            $product->image = $filename;
        }
		$product->id_type         = $request->sltType;
		$product->unit_price      = $request->txtUnitPrice;
		$product->promotion_price = $request->txtPromotionPrice;
		$product->unit            = $request->txtUnit;
		$product->description     = $request->txtDescription;
        $product->save();
        return redirect('product');
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
		$producttype = ProductType::all();
		$product     = Product::findOrFail($id);
        return view('admin.product.edit',['producttype'=>$producttype,'product'=>$product]);
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
		$product       = Product::findOrFail($id);
		$product->name = $request->txtName;
        $file = $request->file('fImage');
        if (strlen($file) > 0) {
            $fImageCurrent = $request->fImageCurrent;
            if (file_exists(public_path().'public/source/image/product/'.$fImageCurrent)) {
                File::delete(public_path().'public/source/image/product/'.$fImageCurrent);
            }

            $filename        = time().'.'.$file->getClientOriginalName();
            $destinationPath = 'public/source/image/product/';
            $file->move($destinationPath,$filename);
            $product->image = $filename;
        }
		$product->id_type         = $request->sltType;
		$product->unit_price      = $request->txtUnitPrice;
		$product->promotion_price = $request->txtPromotionPrice;
		$product->unit            = $request->txtUnit;
		$product->description     = $request->txtDescription;
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $product = Product::findOrFail($id);
        // $product->delete();
        // return redirect('product');

        $id_product = BillDetail::where('id_product',$id)->count();
        if($id_product == 0){
            $product = Product::find($id);
            $product->delete();

            return redirect()->route('product.index');
        } else {
            echo '<script type="text/javascript">
                alert("Bạn không được phép xóa danh mục này");
                window.location = "';
                echo route('product.index');
            echo '"
            </script>';
        }
    }
}
