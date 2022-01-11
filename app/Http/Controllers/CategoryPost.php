<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Slider;
use App\Exports\ExcelExports;
use App\Imports\ExcelImports;
use Excel;
use App\CatePost;
use Session;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use function GuzzleHttp\Promise\all;
class CategoryPost extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_cate_post(){
        $this->AuthLogin();
        return view('admin.category_post.add_category');
    }
    public function all_cate_post()
    {
        $this->AuthLogin();

        $all_cate_post = DB::table('tbl_category_post')->orderBy('cate_post_id','DESC')->paginate(10);
        return view('admin.category_post.all_cate_post')->with('all_cate_post', $all_cate_post);
    }

    public function unactive_cate_post($cate_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_post')->where('cate_post_id',$cate_id)->update(['cate_post_status'=>1]);
        Session::put('message','Không kích hoạt danh mục bài viết thành công');
        return Redirect::to('all-cate-post');
    }
    public function active_cate_post($cate_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_post')->where('cate_post_id',$cate_id)->update(['cate_post_status'=>0]);
        Session::put('message','Kích hoạt danh bài viết thành công');
        return Redirect::to('all-cate-post');
    }

    public function edit_cate_post($cate_post_id){
        $this->AuthLogin();
        $cate_post = CatePost::where('cate_post_id',$cate_post_id)->get();

        return view('admin.category_post.edit_cate_post')->with('cate_post', $cate_post);
    }
    public function update_cate_post(Request $request,$cate_post){
        $this->AuthLogin();

        $data =CatePost::find($cate_post);
        $data->cate_post_name=$request->cate_post_name;
        $data->cate_post_slug=$request->cate_post_slug;
        $data->cate_post_status=$request->cate_post_status;
        $data->cate_post_desc=$request->cate_post_desc;
        $data->save();
        Session::put('message','Cập nhật danh mục bài viết thành công');
        return Redirect::to('all-cate-post');
    }

    public function delete_cate_post($cate_post){
        $this->AuthLogin();
        $data =CatePost::find($cate_post);
        $data->delete();
        Session::put('message','Xóa danh mục bài viết thành công');
        return Redirect::to('all-cate-post');

    }
}
