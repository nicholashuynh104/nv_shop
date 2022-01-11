<?php

namespace App\Http\Controllers;

use App\CatePost;
use App\Post;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Mail;
use App\Slider;
use Illuminate\Support\Facades\Redirect;
use App\Theme;
use App\Product;
use App\Gallery;
session_start();

class HomeController extends Controller
{
    public function error_page(){
        return view('errors.404');
    }
    public function send_mail(){
         //send mail
                $to_name = "Nhat";
                $to_email = "huynhvietnhat155@gmail.com";//send to this email


                $data = array("name"=>"Mail từ tài khoản Khách hàng","body"=>'Mail gửi về vấn về hàng hóa'); //body of mail.blade.php

                Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){

                    $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail
                });

    }

    public function index(Request $request){

        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc = "Chuyên bán những phụ kiện ,thiết bị game";
        $meta_keywords = "thiet bi game,phu kien game,game phu kien,game giai tri";
        $meta_title = "Phụ kiện,máy chơi game chính hãng";
        $url_canonical = $request->url();
        //--seo

    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(9);
         $edit_layout =Theme::find('1');
        $layout =   $edit_layout->type_layout;
        if($layout == 1) {
             $all_product_mobile = DB::table('tbl_product')
            ->where('product_status','0')
            ->where('category_id','13')
            ->orderby(DB::raw('RAND()'))->paginate(3);}
        
        else{
            $all_product_mobile = DB::table('tbl_product')
            ->where('product_status','0')
            ->where('category_id','13')
            ->orderby(DB::raw('RAND()'))->paginate(6);}
        
  
     
        $all_product_laptop = DB::table('tbl_product')
            ->where('product_status','0')
            ->where('category_id','19')
            ->orderby(DB::raw('RAND()'))->paginate(3);
        $all_product_tablet = DB::table('tbl_product')
            ->where('product_status','0')
            ->where('category_id','16')
            ->orderby(DB::raw('RAND()'))->paginate(3);
        $all_product_phukien = DB::table('tbl_product')
            ->where('product_status','0')
            ->where('category_id','20')
            ->orderby(DB::raw('RAND()'))->paginate(3);
       $all_cate_post =CatePost::all();
       // $category_post = CatePost::orderBy('cate_post_id','DESC')->get();

       // $layout = DB::table('tbl_theme')->where('layout_id','1')->orderby('layout_id','desc')->get();
       


        return view('pages.home')->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('all_product',$all_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider)
            ->with('all_product_mobile',$all_product_mobile)
            ->with('all_cate_post',$all_cate_post)
            ->with('all_product_laptop',$all_product_laptop)
            ->with('all_product_tablet',$all_product_tablet)
            ->with('all_product_phukien',$all_product_phukien)
            ->with('all_cate_post',$all_cate_post)
            ->with('layout',$layout);

    }
    public function search(Request $request){
         //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        //seo
        $meta_desc = "Tìm kiếm sản phẩm";
        $meta_keywords = "Tìm kiếm sản phẩm";
        $meta_title = "Tìm kiếm sản phẩm";
        $url_canonical = $request->url();
        //--seo
        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->take(6)->get();

        $all_cate_post =CatePost::all();


        return view('pages.sanpham.search')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('search_product',$search_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider)
            ->with('all_cate_post',$all_cate_post);

    }

  

    public function change_layout(){
  
       
        return view('admin.theme.edit_layout');
    }

    public function edit_layout(Request $request){
  
        $edit_layout =Theme::find('1');
        $edit_layout->type_layout = $request->change_layout;
        $edit_layout->save();


        Session::put('message','Thay đổi giao diện thành công');
        return Redirect::to('change-layout');
    }
       public function quickview(Request $request){
        $product_id = $request->product_id;

        $product = Product::find($product_id);

        $gallery = Gallery::where('product_id',$product_id)->get();
        
        $output['product_gallery']='';
        
        foreach ($gallery as $key => $gal) {
            $output['product_gallery'] .= '<p><img width="80%" src="public/uploads/gallery/'.$gal->gallery_image.'"></p>'; 
        }
        
        $output['product_name'] = $product->product_name;
        $output['product_id'] = $product->product_id;
        $output['product_desc'] = $product->product_desc;
        $output['product_content'] = $product->product_content;
        $output['product_price'] = number_format($product->product_price,0,',','.').'VNĐ';
        $output['product_image'] = '<p><img width="80%" src="public/uploads/product/'.$product->product_image.'"></p>'; 
        $output['product_button'] = '<input type="button" value="Mua ngay" class="btn btn-primary btn-sm add-to-cart-quickview" data-id_product="'.$product->product_id.'" name="add-to-cart">';
        $output['product_qty'] = '<input name="qty" type="number" min="1" class="cart_product_qty_'.$product->product_id.'"  value="1">';

        $output['product_quickview_value'] = '

        <input type="hidden" value="'.$product->product_id.'" class="cart_product_id_'.$product->product_id.'">

        <input type="hidden" value="'.$product->product_name.'" class="cart_product_name_'.$product->product_id.'">
                                          
        <input type="hidden" value="'.$product->product_quantity.'" class="cart_product_quantity_'.$product->product_id.'">
                                            
        <input type="hidden" value="'.$product->product_image.'" class="cart_product_image_'.$product->product_id.'">
        
        
        
        ';
        
        echo json_encode($output);
    }
}
