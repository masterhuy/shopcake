<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Product;
use App\ProductType;
// use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\Models\User;
use Hash;
use Auth;
use DB,Mail;
use App;
use Cart;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        $loai_sp = ProductType::all();
        $slide             = Slide::all();
        $new_product       = DB::table('products')->select('id','name','trans_name','alias','image','unit_price','promotion_price')->orderBy('id','ASC')->skip(0)->paginate(8);
        $sanpham_khuyenmai = DB::table('products')->select('id','name','trans_name','alias','image','unit_price','promotion_price')->orderBy('id','DESC')->paginate(8);
        return view('page.trangchu',['slide'=>$slide,'new_product'=>$new_product,'sanpham_khuyenmai'=>$sanpham_khuyenmai,'loai_sp'=>$loai_sp]);
    }

    public function getLoaiSp($type){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac     = Product::where('id_type','<>',$type)->paginate(3);
        $loai        = ProductType::all();
        $loai_sp     = ProductType::where('id',$type)->first();
        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }

    public function getChitiet(Request $req){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        $sanpham_moi    = DB::table('products')->select('id','name','trans_name','alias','image','unit_price','promotion_price')->orderBy('id','ASC')->skip(0)->paginate(4);
        $sanpham_noibat = DB::table('products')->select('id','name','trans_name','alias','image','unit_price','promotion_price')->orderBy('id','DESC')->paginate(4);
        $sanpham        = Product::where('id',$req->id)->first();
        $sp_tuongtu     = Product::where('id_type',$sanpham->id_type)->paginate(4);
        return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu','sanpham_moi','sanpham_noibat'));
    }

    public function getLienHe(){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
    	return view('page.lienhe');
    }

    public function postLienHe(Request $request){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        $data = [
                    'hoten'   =>$request->name,
                    'email'   =>$request->email,
                    'tieude'  =>$request->subject,
                    'tinnhan' =>$request->message
                ];

        Mail::send('mail.trangguimail',$data,function($msg){
            $msg->from('nodanhtoi123@gmail.com','Quang Huy');
            $msg->to('nodanhtoi123@gmail.com')->subject('Thư góp ý');
        });
        echo "<script>
                alert('Cảm ơn bạn đã góp ý.');
                window.location = '".url('/')."'
            </script>";
    }

    public function getGioiThieu(){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
    	return view('page.gioithieu');
    }

    public function getAddtoCart(Request $req,$id){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart    = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDelItemCart($id){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart    = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout(){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        return view('page.dat_hang');
    }

    public function postCheckout(Request $req){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        $cart = Session::get('cart');

        $customer               = new Customer;
        $customer->name         = $req->name;
        $customer->gender       = $req->gender;
        $customer->email        = $req->email;
        $customer->address      = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note         = $req->notes;
        $customer->save();

        $bill              = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order  = date('Y-m-d');
        $bill->total       = $cart->totalPrice;
        $bill->payment     = $req->payment_method;
        $bill->note        = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail             = new BillDetail;
            $bill_detail->id_bill    = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity   = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
        echo "<script>
                alert('Cảm ơn bạn đã mua hàng của chúng tôi. <br>
                Chúc bạn có một ngày mua sắm vui vẻ!!');
                window.location = '".url('/')."'
            </script>";
    }

    public function getLogin(){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        return view('page.dangnhap');
    }
    public function getSignin(){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        return view('page.dangki');
    }

    public function postSignin(Request $req){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        $this->validate($req,
            [
                'email'       =>'required|email|unique:users,email',
                'password'    =>'required|min:6|max:20',
                'fullname'    =>'required',
                're_password' =>'required|same:password'
            ],
            [
                'email.required'    =>'Vui lòng nhập email',
                'email.email'       =>'Không đúng định dạng email',
                'email.unique'      =>'Email đã có người sử dụng',
                'password.required' =>'Vui lòng nhập mật khẩu',
                're_password.same'  =>'Mật khẩu không giống nhau',
                'password.min'      =>'Mật khẩu ít nhất 6 kí tự'
            ]);
        $user              = new User();
        $user->name        = $req->fullname;
        $user->email       = $req->email;
        $user->password    = Hash::make($req->password);
        $user->phone       = $req->phone;
        $user->address     = $req->address;
        $user->provider    = 'null';
        $user->provider_id = 'null';
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function postLogin(Request $req){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        $this->validate($req,
            [
                'email'    =>'required|email',
                'password' =>'required|min:6|max:20'
            ],
            [
                'email.required'    =>'Vui lòng nhập email',
                'email.email'       =>'Email không đúng định dạng',
                'password.required' =>'Vui lòng nhập mật khẩu',
                'password.min'      =>'Mật khẩu ít nhất 6 kí tự',
                'password.max'      =>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        $user = User::where([
                ['email','=',$req->email],
            ])->first();

        if($user){
            if(Auth::attempt($credentials)){

            return redirect()->route('index')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            }
        }
        else{
           return redirect()->back()->with(['flag'=>'danger','message'=>'Tài khoản chưa kích hoạt']); 
        }
        
    }
    public function postLogout(){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        Auth::logout();
        return redirect()->back();
    }

    public function getSearch(Request $request){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        $product = Product::where('name','like','%'.$request->key.'%')->orWhere('unit_price',$request->key)->paginate(8);
        return view('page.search',['product'=>$product]);
    }


    /*test cart*/
    public function addcart($id)
    {
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        $pro = Product::where('id',$id)->first();
        Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->unit_price,'options' => ['img' => $pro->image,'alias'=>$pro->alias,'trans_name'=>$pro->trans_name]]);
        return redirect()->back()->with('thongbao','tb');
    }

    public function addtocartmore($id,$qty)
    {
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        $pro = Product::where('id',$id)->first();
        Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => $qty, 'price' => $pro->unit_price,'options' => ['img' => $pro->image,'trans_name'=>$pro->trans_name]]);
        return redirect()->back()->with('thongbao','tb');
    }

    public function ordernow($id)
    {
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        $pro = Product::where('id',$id)->first();
        Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->unit_price,'options' => ['img' => $pro->image,'trans_name'=>$pro->trans_name]]);
        return redirect()->route('dathang');
    }

    public function updatecart($id,$qty){
        Cart::update($id,$qty);
        echo Cart::count();
    }

    public function updatecart_mgg($mgg){
       if($mgg == 'xyz'){
        $tong_gg = Cart::subtotal()*0.5;
       }
       return view('page.gio_hang',['tong_gg',$tong_gg]);
    }

    public function getupdatecart($id,$qty,$dk)
    {
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        if($dk=='up')
        {
            $qt = $qty+1;
            Cart::update($id, $qt);
            return redirect()->route('dathang');
        } 
        elseif($dk=='down') 
        {
            $qt = $qty-1;
            Cart::update($id, $qt);
            return redirect()->route('dathang');
        } 
        else 
        {
            return redirect()->route('dathang');
        }
    }

    public function getdeletecart($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function xoa()
    {
        Cart::destroy();   
        return redirect()->back();   
    }

    public function getGioHang(){
        if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
        }
        return view('page.gio_hang');
    }
}
