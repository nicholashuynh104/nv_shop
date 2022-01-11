<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Product;
use App\Post;
use App\Video;
use App\Order;
use App\Customer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       view()->composer('*',function($view){
        $products = Product::all()->count();
        $posts = Post::all()->count();
        $order_ = Order::all()->count();
        $video = Video::all()->count();
        $customers = Customer::all()->count();
        $view->with('posts',$posts)->with('order_',$order_)->with('video',$video)->with('customers',$customers)->with('products',$products);
       });
    }
}
