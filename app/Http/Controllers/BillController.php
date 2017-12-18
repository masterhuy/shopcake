<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;
use DB;
use App\Customer;
use App\Product;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill = DB::table('bills')->paginate(10);
        return view('admin.bill.list',['bill'=>$bill]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::find($id);
        $customer = DB::table('customer')->where('id',$bill->id_customer)->first();
        $bill_detail = DB::table('bill_detail')->where('id',$bill->id)->first();
        // $bill_detail = BillDetail::find($id);
        $product = DB::table('products')->where('id',$bill_detail->id_product)->first();
        return view('admin.billdetail.list',['bill'=>$bill,'bill_detail'=>$bill_detail,'customer'=>$customer,'product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $bill = Bill::findOrFail($id);
        $bill->status = $request->sltlevel;
        $bill->save();
        return redirect()->route('bill.index')->with(['flash_level'=>'result_msg','flash_massage'=>' Đã xác nhận đơn hàng thành công !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $bill = Bill::find($id);
        // $bill->delete();
        // return redirect()->route('bill.index');

        $id_bill = BillDetail::where('id_bill',$id)->count();
        if($id_bill == 0){
            $bill = Bill::find($id);
            $bill->delete();

            return redirect()->route('bill.index');
        } else {
            echo '<script type="text/javascript">
                alert("Bạn không được phép xóa danh mục này");
                window.location = "';
                echo route('bill.index');
            echo '"
            </script>';
        }
    }
}
