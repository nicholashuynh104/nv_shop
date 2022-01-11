<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Post;
use App\CatePost;
use App\Slider;
session_start();

class PostController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_post()
    {
        $this->AuthLogin();
        $cate_post =CatePost::all();
        return view('admin.posts.add_posts')->with('cate_post',$cate_post);
    }

    public function save_posts(Request $request)
    {
        $this->AuthLogin();
        $data = new Post();
        $data->posts_title=$request->posts_title;
        $data->posts_desc=$request->posts_desc;
        $data->posts_content=$request->posts_content;
        $data->posts_meta_desc=$request->posts_meta_desc;
        $data->posts_meta_keywords=$request->posts_meta_keywords;
        $data->posts_status=$request->posts_status;
        $data->cate_post_id=$request->cate_post_id;
        $data->posts_slug=$request->posts_slug;

        $get_image = $request->file('posts_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/posts',$new_image);
            $data->posts_image = $new_image;
            $data->save();
            Session::put('message','Thêm bài viết thành công');
            return Redirect::to('add-post');
        }
        else
        {
            $data->posts_image = '';
            $data->save();
            Session::put('message','Thêm bài viết thành công');
            return Redirect::to('add-post');
        }
    }

    public function all_post()
    {
        $this->AuthLogin();
        $posts = Post::orderBy('posts_id','DESC')->paginate(10);
        $cate_post = CatePost::all();
        return view('admin.posts.all_posts')->with('posts',$posts)->with('cate_post',$cate_post);
    }
    public function unactive_post($post_id)
    {
        $this->AuthLogin();
        DB::table('tbl_posts')->where('posts_id',$post_id)->update(['posts_status'=>1]);
        Session::put('message','Không kích hoạt danh mục bài viết thành công');
        return Redirect::to('all-post');
    }
    public function active_post($post_id)
    {
        $this->AuthLogin();
        DB::table('tbl_posts')->where('posts_id',$post_id)->update(['posts_status'=>0]);
        Session::put('message','Kích hoạt danh bài viết thành công');
        return Redirect::to('all-post');
    }

    public function edit_post($post_id)
    {
        $this->AuthLogin();
        $eidt = Post::find($post_id);
        $cate_post=CatePost::all();
        return view('admin.posts.edit_posts')->with('edit',$eidt)->with('catepost',$cate_post);
    }
    public function update_post(Request $request,$post_id)
    {
        $this->AuthLogin();
        $edit_post =Post::find($post_id);
        $edit_post->posts_title=$request->posts_title;
        $edit_post->posts_desc=$request->posts_desc;
        $edit_post->posts_content=$request->posts_content;
        $edit_post->posts_meta_desc=$request->posts_meta_desc;

        $edit_post->cate_post_id=$request->cate_post_id;
        $edit_post->posts_slug=$request->posts_slug;
        $get_image = $request->file('posts_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/posts',$new_image);
            $edit_post->posts_image = $new_image;
            $edit_post->save();
            Session::put('message','Sửa bài viết thành công');
            return Redirect::to('all-post');
        }
        else
        {

            $edit_post->save();
            Session::put('message','Sửa bài viết thành công');
            return Redirect::to('all-post');
        }

    }
    public function delete_post($post_id)
    {
        $this->AuthLogin();
        $delete =Post::find($post_id);
        $delete->delete();
        Session::put('message','Xóa bài viết thành công');
        return Redirect::to('all-post');
    }
    public function danh_muc_bai_viet(Request $request,$post_slug){
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $catepost= CatePost::where('cate_post_slug',$post_slug )->take(1)->get();
        $all_cate_post =CatePost::all();
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();

        foreach ($catepost as $key => $cate) {
        //seo 
        $meta_desc = $cate->cate_post_desc; 
        $meta_keywords = $cate->cate_post_slug;
        $meta_title = $cate->cate_post_name;
        $cate_id=$cate->cate_post_id;
        $url_canonical = $request->url();
        //--seo
    }
        $post = Post::with('cate_post')->where('posts_status',0)->where('cate_post_id',$cate_id)->paginate(5);
        return view('pages.baiviet.danhmucbaiviet')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('category_post',$category_post)->with('post',$post)->with('all_cate_post',$all_cate_post)->with('slider',$slider);
    }

    public function bai_viet(Request $request,$post_slug){
          //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        $all_cate_post =CatePost::all();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $post = Post::with('cate_post')->where('posts_status',0)->where('posts_slug',$post_slug)->take(1)->get();
        foreach ($post as $key => $p) {
        //seo 
        $meta_desc = $p->post_meta_desc; 
        $meta_keywords = $p->post_meta_keywords;
        $meta_title = $p->posts_title;
        $cate_id=$p->cate_post_id;
        $url_canonical = $request->url();
        $cate_post_id=$p->cate_post_id;
        //--seo
        $post_id=$p->posts_id;
        $pro_name = CatePost::where('cate_post_status',0)->where('cate_post_id',$cate_id)->take(1)->get();
        // $pro_name = $name->cate_post_name; // lay ten danh muc cho Breadcrum
        $cate_slug =CatePost::where('cate_post_id',$cate_id)->get(); // lấy qua Breadcrum
    }
        $post1 = Post::where('posts_id',$post_id)->first();
        // $post1->post_views = (int)$post1->post_views + 1;
        // $post1 ->save();
        $related=Post::with('cate_post')->where('posts_status',0)->where('cate_post_id',$cate_post_id)->whereNotIn('posts_slug',[$post_slug])->take(5)->get();
            
        return view('pages.baiviet.baiviet')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('category_post',$category_post)->with('post',$post)->with('related',$related)->with('all_cate_post',$all_cate_post)->with('pro_name',$pro_name)->with('cate_slug',$cate_slug);
    }

}
