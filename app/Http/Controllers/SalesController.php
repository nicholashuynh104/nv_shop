<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\OrderDetails;
use phpDocumentor\Reflection\Types\Array_;

class SalesController extends Controller
{
    
    public function manage_sale_view()
    {
        return view('admin.sales.manage_sales');
    }
    public function manage_sales(Request $request)
    {

        $date= Carbon::parse($request->date)->format('Y/m/d');
        $sum=0;
        $order = DB::table('tbl_order')->where('order_status','2')->whereDate('created_at', $date)->get();
        foreach ($order as $key =>$value)
        {
             $sp= DB::table('tbl_order_details')->where('order_code',$value->order_code)->get();
            foreach ($sp as $key2 =>$value2)
            {
                $tt =  $value2->product_price * $value2->product_sales_quantity + $value2->product_feeship;
                $sum =$sum +$tt;
            }

        }
            return view('admin.sales.manage_sales')->with('data',$sum)->with('date',$date);

    }
    public function manage_sales_month()
    {
        return view ('admin.sales.manage_sales_month');
    }
    public function manage_sales_month_post(Request $request)
    {
        $sales = 0;
        $thang =new Array_();

        for ($i = 1; $i <=12; $i++)
        {
            $sum=0;

            $order = DB::table('tbl_order')->where('order_status','2')
                ->whereYear('created_at', $request->year)->whereMonth('created_at',$i)->get();
            foreach ($order as $key =>$value)
            {
                $sp= DB::table('tbl_order_details')->where('order_code',$value->order_code)->get();
                foreach ($sp as $key2 =>$value2)
                {
                    $tt =  $value2->product_price * $value2->product_sales_quantity + $value2->product_feeship;
                    $sum =$sum +$tt;
                   $sales =$sum;
                }
            }

            $thangi = "['Tháng ".$i."'".','.$sales."],";
            $thang =$thang . $thangi;
            $sales =0;
        }

        $thangx =substr($thang,5);

        $data = "[['Tháng', 'Doanh thu']," .$thangx ."]";
        return view('admin.sales.manage_sales_month')->with('data',$data);
    }

    public function manage_sales_years()
    {
        return view('admin.sales.manage_sales_years');
    }
     public function select_sales(Request $request)
    { 
        $sales = 0;
        $thang =new Array_();
        dd($sales);


        for ($i = 1; $i <=12; $i++)
        {
            $sum=0;

            $order = DB::table('tbl_order')->where('order_status','2')
                ->whereYear('created_at', $request->year)->whereMonth('created_at',$i)->get();
            foreach ($order as $key =>$value)
            {
                $sp= DB::table('tbl_order_details')->where('order_code',$value->order_code)->get();
                foreach ($sp as $key2 =>$value2)
                {
                    $tt =  $value2->product_price * $value2->product_sales_quantity + $value2->product_feeship;
                    $sum =$sum +$tt;
                   $sales =$sum;
                }
            }

            $thangi = "['Tháng ".$i."'".','.$sales."],";
            $thang =$thang . $thangi;
            $sales =0;
        }

        $thangx =substr($thang,5);

        $data = "[['Tháng', 'Doanh thu']," .$thangx ."]";
        return json_encode(compact('data'));        // return view('admin.sales.manage_sales_month')->with('data',$data);
    

    }
    public function manage_sales_years_post(Request  $request)
    {
        $sales = 0;
        $thang =new Array_();
        $n =19+$request->year;

        for ($i = 19; $i <=$n; $i++)
        {
            $sum=0;

            $order = DB::table('tbl_order')->where('order_status','2')
                ->whereYear('created_at',2000 +$i)->get();
            foreach ($order as $key =>$value)
            {
                $sp= DB::table('tbl_order_details')->where('order_code',$value->order_code)->get();
                foreach ($sp as $key2 =>$value2)
                {
                    $tt =  $value2->product_price * $value2->product_sales_quantity + $value2->product_feeship;
                    $sum =$sum +$tt;
                    $sales =$sum;
                }
            }

            $thangi = "['năm 20".$i."'".','.$sales."],";
            $thang =$thang . $thangi;
            $sales =0;
        }

        $thangx =substr($thang,5);

        $data = "[['Năm', 'Doanh thu']," .$thangx ."]";
        return view('admin.sales.manage_sales_years')->with('data',$data);
    }
}
