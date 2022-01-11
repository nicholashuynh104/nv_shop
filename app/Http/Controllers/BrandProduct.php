<?php

namespace App\Http\Controllers;

use App\CatePost;
use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Product;

use App\Slider;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class BrandProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_brand_product(){
        $this->AuthLogin();
    	return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $this->AuthLogin();
    	//$all_brand_product = DB::table('tbl_brand')->get(); //static huong doi tuong
        // $all_brand_product = Brand::all();
        $all_brand_product = Brand::orderBy('brand_id','DESC')->paginate(10);
    	$manager_brand_product  = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
    	return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);


    }
    public function save_brand_product(Request $request){
        $this->AuthLogin();
        $data = $request->all();

        $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_slug = $data['brand_slug'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();


    	Session::put('message','Thêm thương hiệu sản phẩm thành công');
    	return Redirect::to('add-brand-product');
    }
    public function unactive_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        Session::put('message','Không kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');

    }
    public function active_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        Session::put('message','Kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');

    }
    public function edit_brand_product($brand_product_id){
        $this->AuthLogin();

        // $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();
        $edit_brand_product = Brand::where('brand_id',$brand_product_id)->get();
        $manager_brand_product  = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);

        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }
    public function update_brand_product(Request $request,$brand_product_id){
        $this->AuthLogin();
        $data = $request->all();
        $brand = Brand::find($brand_product_id);
        // $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_slug = $data['brand_product_slug'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();

        Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    public function delete_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }

    //End Function Admin Page

     public function show_brand_home(Request $request, $brand_slug){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();


        $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('tbl_brand.brand_slug',$brand_slug)->paginate(6);

        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_slug',$brand_slug)->limit(1)->get();
         $all_cate_post =CatePost::all();
        foreach($brand_name as $key => $val){
            //seo
            $meta_desc = $val->brand_desc;
            $meta_keywords = $val->brand_desc;
            $meta_title = $val->brand_name;
            $url_canonical = $request->url();
            $cate_slug =$val->brand_slug;

            //--seo
        }

        return view('pages.brand.show_brand')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('brand_by_id',$brand_by_id)
            ->with('brand_name',$brand_name)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider)
            ->with('all_cate_post',$all_cate_post)
            ->with('cate_slug',$cate_slug);
    }


    public function thuong_hieu(Request $request){
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->where('category_parent','0')->orderby('category_id','desc')->get();
      
        $price_min = DB::table('tbl_product')->min('product_price');


        $price_max = DB::table('tbl_product')->max('product_price');
        $price_max = $price_max + 100000 ;
        // dd($price_max);


        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
            $meta_desc = 'Danh mục sản phẩm';
            $meta_keywords = 'Danh mục sản phẩm';
            $meta_title = 'Danh mục sản phẩm';
            $url_canonical = $request->url();
            $all_cate_post =CatePost::all();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(12); 




        return view('pages.filter.filter')
           
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider)
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('all_cate_post',$all_cate_post)
            ->with('all_product',$all_product)
            ->with('price_min',$price_min)
            ->with('price_max',$price_max)




            ;
    }


    
    public function fetch_data(Request $request){


        if(isset($_POST["action"]))
{
    $query = "
        SELECT * FROM tbl_product WHERE product_status = '0'
    ";
    
    if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
    {
        $query .= "
         AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
        ";

    }
    if(isset($_POST["brand"]))
    {
        $brand_filter = implode("','", $_POST["brand"]);
        $query .= "
         AND brand_id IN('".$brand_filter."')
        ";
    }
       if(isset($_POST["category"]))
    {
        $category_filter = implode("','", $_POST["category"]);
        $query .= "
         AND category_id IN('".$category_filter."')
        ";
    }
      if(isset($_POST["color"]))
    {
        $color_filter = implode("','", $_POST["color"]);
        $query .= "
         AND product_color IN('".$color_filter."')
        ";
    }


    $pdo = DB::connection()->getPdo();
    $statement = $pdo->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();
    $output = '';
    if($total_row > 0)
    {
        foreach($result as $row)
         {   
           $output .= '
            <div class="col-sm-4 col-lg-3 col-md-3">
                <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:320px;">


                    <img src="public/uploads/product/'.$row['product_image'].'" alt="" class="img-responsive" >
                
                    <p align="center"><strong><a href="'.url('/chi-tiet/'.$row['product_slug']).'">'. $row['product_name'] .'</a></strong></p>

                    <h4 style="text-align:center;" class="text-danger" >'.number_format($row['product_price'],0,',','.').' '.'VNĐ'.'</h4>
                   
                </div>

            </div>
            ';
        }
    }
    else
    {
        $output = '<h3>No Data Found</h3>';
    }
    echo $output;
}






    }




    public function san_pham(Request $request){
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->where('category_parent','0')->orderby('category_id','desc')->get();
      
        $price_min = DB::table('tbl_product')->min('product_price');


        $price_max = DB::table('tbl_product')->max('product_price');
        $price_max = $price_max + 100000 ;
        // dd($price_max);


        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
            $meta_desc = 'Danh mục sản phẩm';
            $meta_keywords = 'Danh mục sản phẩm';
            $meta_title = 'Danh mục sản phẩm';
            $url_canonical = $request->url();
            $all_cate_post =CatePost::all();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(12); 




        return view('pages.filter.filter_product')
           
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider)
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('all_cate_post',$all_cate_post)
            ->with('all_product',$all_product)
            ->with('price_min',$price_min)
            ->with('price_max',$price_max)




            ;
    }
    public function fetch_data2(Request $request){
      
        if(isset($_POST["action"]))
{
    $query = "
        SELECT * FROM tbl_product WHERE product_status = '0'
    ";
    
    if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
    {
        $query .= "
         AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
        ";

    }
    if(isset($_POST["brand"]))
    {
        $brand_filter = implode("','", $_POST["brand"]);
        $query .= "
         AND brand_id IN('".$brand_filter."')
        ";
    }
       if(isset($_POST["category"]))
    {
        $category_filter = implode("','", $_POST["category"]);
        $query .= "
         AND category_id IN('".$category_filter."')
        ";
    }
      if(isset($_POST["color"]))
    {
        $color_filter = implode("','", $_POST["color"]);
        $query .= "
         AND product_color IN('".$color_filter."')
        ";
    }

    
    
    $pdo = DB::connection()->getPdo();
    $statement = $pdo->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $total_row = $statement->rowCount();
    $output = '';

    if($total_row > 0)
    {
        foreach($result as $row)
         {   
           $output .= '
            <div class="col-sm-4 col-lg-3 col-md-3">
                <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:320px;">
                    <img src="public/uploads/product/'.$row['product_image'].'" alt="" class="img-responsive" >
                    <p align="center"><strong><a href="'.url('/chi-tiet/'.$row['product_slug']).'">'. $row['product_name'] .'</a></strong></p>
                    <h4 style="text-align:center;" class="text-danger" >'.number_format($row['product_price'],0,',','.').' '.'VNĐ'.'</h4>
                   
                </div>

            </div>
            ';
        }
    }
    else
    {
        $output = '<h3>No Data Found</h3>';
    }
    echo $output;
}

}











}
