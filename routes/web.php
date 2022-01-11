<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Frontend
Route::get('/','HomeController@index' );
Route::get('/trang-chu','HomeController@index');
Route::get('/404','HomeController@error_page');
Route::post('/tim-kiem','HomeController@search');
//liên hệ
Route::get('/lien-he','ContactController@lienhe');
Route::get('/information','ContactController@information');
Route::post('/save-infor','ContactController@save_infor');
Route::post('/update-infor/{infor_id}','ContactController@update_infor');


//DANG NHAP FB
// Route::get('/login-facebook-customer','AdminController@login_facebook_customer');
// Route::get('/customer/facebook/callback','AdminController@callback_facebook_c');





//Tags sản phẩm
Route::get('/tag/{product_tag}','ProductController@tag');



//Danh muc san pham trang chu
Route::get('/danh-muc/{slug_category_product}','CategoryProduct@show_category_home');
Route::get('/thuong-hieu/{brand_slug}','BrandProduct@show_brand_home');

//filter
Route::get('/thuong-hieu','BrandProduct@thuong_hieu');
Route::get('/san-pham','BrandProduct@san_pham');
//filter

Route::post('/fetch-data','BrandProduct@fetch_data');

Route::post('/fetch-data2','BrandProduct@fetch_data2');


// xem nhanh
Route::post('/quickview','HomeController@quickview');

//baiviet
Route::get('/danh-muc-bai-viet/{post_slug}','PostController@danh_muc_bai_viet');
Route::get('/bai-viet/{post_slug}','PostController@bai_viet');

//đánh giá sao
Route::post('/insert-rating','ProductController@insert_rating');




Route::get('/chi-tiet/{product_slug}','ProductController@details_product');
Route::get('/chi-tiet-san-pham/{product_slug}','ProductController@details_product');
//Backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');


//Category Product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');

Route::post('/export-csv','CategoryProduct@export_csv');
Route::post('/import-csv','CategoryProduct@import_csv');


Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');

//Send Mail
Route::get('/send-mail','HomeController@send_mail');

//Login facebook
Route::get('/login-facebook','AdminController@login_facebook');
Route::get('/admin/callback','AdminController@callback_facebook');

//Login google
Route::get('/login-google','AdminController@login_google');
Route::get('/google/callback','AdminController@callback_google');

Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');

//Brand Product
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');

Route::post('/save-brand-product','BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');


//User
// Route::group(['middleware' => 'roles', 'roles'=>['admin','author']], function () {
	Route::get('/add-product','ProductController@add_product');
	Route::get('/edit-product/{product_id}','ProductController@edit_product');
// });
Route::get('users',
		[
			'uses'=>'UserController@index',
			'as'=> 'Users',
			'middleware'=> 'roles'
			// 'roles' => ['admin','author']
		]);
Route::get('add-users','UserController@add_users');
Route::post('store-users','UserController@store_users');
Route::post('assign-roles','UserController@assign_roles');
Route::get('delete-user-roles/{admin_id}','UserController@delete_user_roles');
Route::get('impersonate/{admin_id}','UserController@impersonate');
Route::get('impersonate-destroy','UserController@impersonate_destroy');

//Product
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');

//Coupon
Route::post('/check-coupon','CartController@check_coupon');

Route::get('/unset-coupon','CouponController@unset_coupon');
Route::get('/insert-coupon','CouponController@insert_coupon');
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon');
Route::get('/list-coupon','CouponController@list_coupon');
Route::post('/insert-coupon-code','CouponController@insert_coupon_code');

//Cart
Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::post('/update-cart','CartController@update_cart');
Route::post('/save-cart','CartController@save_cart');
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/show-cart','CartController@show_cart');
Route::get('/gio-hang','CartController@gio_hang');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::get('/del-product/{session_id}','CartController@delete_product');
Route::get('/del-all-product','CartController@delete_all_product');

//Checkout
Route::get('/dang-nhap','CheckoutController@login_checkout');
Route::get('/del-fee','CheckoutController@del_fee');

Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/order-place','CheckoutController@order_place');
Route::post('/login-customer','CheckoutController@login_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::post('/calculate-fee','CheckoutController@calculate_fee');
Route::post('/select-delivery-home','CheckoutController@select_delivery_home');
Route::post('/confirm-order','CheckoutController@confirm_order');

//Order
Route::get('/delete-order/{order_code}','OrderController@order_code');
Route::get('/print-order/{checkout_code}','OrderController@print_order');
Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{order_code}','OrderController@view_order');
Route::post('/update-order-qty','OrderController@update_order_qty');
Route::post('/update-qty','OrderController@update_qty');


//Delivery
Route::get('/delivery','DeliveryController@delivery');
Route::post('/select-delivery','DeliveryController@select_delivery');
Route::post('/insert-delivery','DeliveryController@insert_delivery');
Route::post('/select-feeship','DeliveryController@select_feeship');
Route::post('/update-delivery','DeliveryController@update_delivery');
Route::get('/delete-feeship/{id}','DeliveryController@delete_feeship');
//Banner
Route::get('/manage-slider','SliderController@manage_slider');
Route::get('/add-slider','SliderController@add_slider');
Route::get('/delete-slide/{slide_id}','SliderController@delete_slide');
Route::post('/insert-slider','SliderController@insert_slider');
Route::get('/unactive-slide/{slide_id}','SliderController@unactive_slide');
Route::get('/active-slide/{slide_id}','SliderController@active_slide');

//Authentication roles

Route::get('/register-auth','AuthController@register_auth');
Route::post('/register','AuthController@register');

Route::get('/login-auth','AuthController@login_auth');
Route::post('/login','AuthController@login');

Route::get('/logout-auth','AuthController@logout_auth');

//category post

Route::get('/add-cate-post','CategoryPost@add_cate_post');
Route::post('/save-category-post','CategoryPost@save_category_post');
Route::get('/all-cate-post','CategoryPost@all_cate_post');
Route::get('/unactive-cate-post/{cate_id}','CategoryPost@unactive_cate_post');
Route::get('/active-cate-post/{cate_id}','CategoryPost@active_cate_post');
Route::get('/edit-cate-post/{cate_id}','CategoryPost@edit_cate_post');
Route::post('/update-cate-post/{cate_id}','CategoryPost@update_cate_post');
Route::get('/delete-cate-post/{cate_id}','CategoryPost@delete_cate_post');

// post
Route::get('/add-post','PostController@add_post');
Route::post('/save-posts','PostController@save_posts');
Route::get('/all-post','PostController@all_post');
Route::get('/unactive-post/{post_id}','PostController@unactive_post');
Route::get('/active-post/{post_id}','PostController@active_post');
Route::get('/edit-post/{post_id}','PostController@edit_post');
Route::post('/update-post/{post_id}','PostController@update_post');
Route::get('/delete-post/{post_id}','PostController@delete_post');
 //video
Route::get('/video','VideoController@video');
Route::post('/select-video','VideoController@select_video');
Route::post('/insert-video','VideoController@insert_video');
Route::post('/update-video','VideoController@update_video');
Route::post('/delete-video','VideoController@delete_video');
Route::get('/video-shop','VideoController@video_shop');
Route::post('/update-video-image','VideoController@update_video_image');
Route::post('/watch-video','VideoController@watch_video');
//gallery
Route::get('/add-gallery/{product_id}','GalleryController@add_gallery');
Route::post('/select-gallery','GalleryController@select_gallery');
Route::post('/insert-gallery/{pro_id}','GalleryController@insert_gallery');
Route::post('/update-gallery-name','GalleryController@update_gallery_name');
Route::post('/delete-gallery','GalleryController@delete_gallery');
Route::post('/update-gallery','GalleryController@update_gallery');

//Doanh thu
//theo ngày
Route::get('/manage-sales','SalesController@manage_sale_view');
Route::post('/manage-sales-day','SalesController@manage_sales');
//theo tháng
Route::get('/manage-sales-month','SalesController@manage_sales_month');
Route::post('/manage-sales-month-post','SalesController@manage_sales_month_post');
//theo năm
Route::get('/manage-sales-years','SalesController@manage_sales_years');
Route::post('/manage-sales-years-post','SalesController@manage_sales_years_post');

Route::post('/select-sales','SalesController@select_sales');

Route::post('/filter-by-date','AdminController@filter_by_date');
Route::post('/days-order','AdminController@days_order');

Route::post('/dashboard-filter','AdminController@dashboard_filter');


//show-list


//change layot
Route::get('/change-layout','HomeController@change_layout');
Route::post('/edit-layout','HomeController@edit_layout');

//change language
Route::group(['middleware' => 'locale'], function(){
Route::get('/language/{language}','AdminController@language')->name('language.language');
});
















