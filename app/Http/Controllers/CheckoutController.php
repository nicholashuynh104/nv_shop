<?php


namespace App\Http\Controllers;

use App\CatePost;
use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use App\City;
use App\Province;
use App\Wards;
use App\Feeship;
use App\Slider;
use App\Shipping;
use App\Order;
use App\OrderDetails;
use App\Customer;
use Carbon\Carbon;


class CheckoutController extends Controller
{

    public function confirm_order(Request $request){
        $data = $request->all();

        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        $checkout_code = substr(md5(microtime()),rand(0,26),5);

        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $order->order_date = $today;
        $order->created_at = now();
        $order->save();

        if(Session::get('cart')==true){
        foreach(Session::get('cart') as $key => $cart){
            $order_details = new OrderDetails;
            $order_details->order_code = $checkout_code;
            $order_details->product_id = $cart['product_id'];
            $order_details->product_name = $cart['product_name'];
            $order_details->product_price = $cart['product_price'];
            $order_details->product_sales_quantity = $cart['product_qty'];
            $order_details->product_coupon =  $data['order_coupon'];
            $order_details->product_feeship = $data['order_fee'];
            $order_details->save();
        }
        }
        Session::forget('coupon');
        Session::forget('fee');
        Session::forget('cart');
    }
    public function del_fee(){
        Session::forget('fee');
        return redirect()->back();
    }

     public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function calculate_fee(Request $request){
        $data = $request->all();
        if($data['matp']){
            $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
            if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship>0){
                     foreach($feeship as $key => $fee){
                        Session::put('fee',$fee->fee_feeship);
                        Session::save();
                    }
                }else{
                    Session::put('fee',25000);
                    Session::save();
                }
            }

        }
    }
    public function select_delivery_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                    $output.='<option>---Ch???n qu???n huy???n---</option>';
                foreach($select_province as $key => $province){
                    $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }

            }else{

                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output.='<option>---Ch???n x?? ph?????ng---</option>';
                foreach($select_wards as $key => $ward){
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
            echo $output;
        }
    }
    public function view_order($orderId){
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*')->first();

        $manager_order_by_id  = view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);

    }
    public function login_checkout(Request $request){
         //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();


        //seo
        $meta_desc = "????ng nh???p thanh to??n";
        $meta_keywords = "????ng nh???p thanh to??n";
        $meta_title = "????ng nh???p thanh to??n";
        $url_canonical = $request->url();
        //--seo

    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $all_cate_post =CatePost::all();
    	return view('pages.checkout.login_checkout')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider)
            ->with('all_cate_post',$all_cate_post);
    }
    public function add_customer(Request $request){

    	 $this->validate($request,[

            'customer_email' => 'required|email|max:255',
            'customer_password' => 'required|string|min:6',
            'customer_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password_confirmation' =>'required|same:customer_password'

        ],[
            'customer_email.required'=>'B???n ch??a nh???p email',
            'customer_email.email'=>'Email kh??ng ????ng ?????nh d???ng',
            'customer_password.required' => 'B???n ch??a nh???p m???t kh???u',
            'customer_password.min' =>'M???t kh???u ??t nh???t 6 k?? t???',
            'customer_phone.min' =>'S??? ??i???n tho???i 10 s???',
            'password_confirmation.same' =>'M???t kh???u kh??ng tr??ng kh???p'
        ]);
        $data = array();
        $maillll = DB::table('tbl_customers')->where('customer_email',$request->customer_email)->take(1)->get();
        foreach ($maillll as $key => $mail) {
            if ($mail->customer_id) {

                Session::put('message','T??i kho???n ???? t???n t???i');

        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc = "????ng nh???p thanh to??n";
        $meta_keywords = "????ng nh???p thanh to??n";
        $meta_title = "????ng nh???p thanh to??n";
        $url_canonical = $request->url();
        //--seo

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $all_cate_post =CatePost::all();
        return view('pages.checkout.login_checkout')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider)
            ->with('all_cate_post',$all_cate_post);
        }

      }
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect::to('/checkout');

    }
    public function checkout(Request $request){
         //seo
         //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $meta_desc = "????ng nh???p thanh to??n";
        $meta_keywords = "????ng nh???p thanh to??n";
        $meta_title = "????ng nh???p thanh to??n";
        $url_canonical = $request->url();
        //--seo
        $all_cate_post =CatePost::all();
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $city = City::orderby('matp','ASC')->get();

    	return view('pages.checkout.show_checkout')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('city',$city)
            ->with('slider',$slider)
            ->with('all_cate_post',$all_cate_post);
    }
    public function save_checkout_customer(Request $request){
    	$data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_notes'] = $request->shipping_notes;
    	$data['shipping_address'] = $request->shipping_address;

    	$shipping_id = DB::table('tbl_shipping')->insertGetId($data);

    	Session::put('shipping_id',$shipping_id);

    	return Redirect::to('/payment');
    }
    public function payment(Request $request){
        //seo
        $meta_desc = "????ng nh???p thanh to??n";
        $meta_keywords = "????ng nh???p thanh to??n";
        $meta_title = "????ng nh???p thanh to??n";
        $url_canonical = $request->url();
        //--seo
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $all_cate_post =CatePost::all();
        return view('pages.checkout.payment')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('all_cate_post',$all_cate_post);

    }
    public function order_place(Request $request){
        //insert payment_method
        //seo
        $meta_desc = "????ng nh???p thanh to??n";
        $meta_keywords = "????ng nh???p thanh to??n";
        $meta_title = "????ng nh???p thanh to??n";
        $url_canonical = $request->url();
        //--seo
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = '??ang ch??? x??? l??';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = '??ang ch??? x??? l??';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_details
        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_d_data);
        }
        if($data['payment_method']==1){

            echo 'Thanh to??n th??? ATM';

        }elseif($data['payment_method']==2){
            Cart::destroy();
            $all_cate_post =CatePost::all();
            $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
            return view('pages.checkout.handcash')
                ->with('category',$cate_product)
                ->with('brand',$brand_product)
                ->with('meta_desc',$meta_desc)
                ->with('meta_keywords',$meta_keywords)
                ->with('meta_title',$meta_title)
                ->with('url_canonical',$url_canonical)
                ->with('all_cate_post',$all_cate_post);

        }else{
            echo 'Th??? ghi n???';

        }

        //return Redirect::to('/payment');
    }
    public function logout_checkout(){
    	Session::forget('customer_id');
    	return Redirect::to('/dang-nhap');
    }
    public function login_customer(Request $request){
    	$email = $request->email_account;
    	$password = md5($request->password_account);
    	$result = DB::table('tbl_customers')
            ->where('customer_email',$email)
            ->where('customer_password',$password)->first();


    	if($result){

    		Session::put('customer_id',$result->customer_id);
    		return Redirect::to('/checkout');
    	}else{
    		return Redirect::to('/dang-nhap');
    	}
        Session::save();

    }
    public function manage_order(){

        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order  = view('admin.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manage_order', $manager_order);
    }
}
