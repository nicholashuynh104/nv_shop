<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\City;
use App\Province;
use App\Wards;
use App\Feeship;
use DB;
use Illuminate\Support\Facades\Redirect;

class DeliveryController extends Controller
{
    public function update_delivery(Request $request){
        $data = $request->all();
        $fee_ship = Feeship::find($data['feeship_id']);
        $fee_value = rtrim($data['fee_value'],'.');
        $fee_ship->fee_feeship = $fee_value;
        $fee_ship->save();
    }
    public function select_feeship(){
        $feeship = Feeship::orderby('fee_id','DESC')->get();
        $output = '';
        $output .= '<div class="table-responsive">
			<table class="table table-bordered">
				<thread>
					<tr>
						<th>Tên thành phố</th>
						<th>Tên quận huyện</th>
						<th>Tên xã phường</th>
						<th>Phí ship</th>
					</tr>
				</thread>
				<tbody>
				';

        foreach($feeship as $key => $fee){

            $output.='
					<tr>
						<td>'.$fee->city->name_city.'</td>
						<td>'.$fee->province->name_quanhuyen.'</td>
						<td>'.$fee->wards->name_xaphuong.'</td>
						<td contenteditable data-feeship_id="'.$fee->fee_id.'" class="fee_feeship_edit">'.number_format($fee->fee_feeship,0,',','.').'</td>
					</tr>
					';
        }

        $output.='
				</tbody>
				</table></div>
				';

        echo $output;


    }
    public function insert_delivery(Request $request){
        $data = $request->all();
        $fee_ship = new Feeship();
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_xaid = $data['wards'];
        $fee_ship->fee_feeship = $data['fee_ship'];
        $fee_ship->save();

    }
    public function delivery(Request $request){

        $city = City::orderby('matp','ASC')->get();
        $all = Feeship::orderBy('fee_id','DESC')->get();
        $tinh = DB::table('tbl_tinhthanhpho')->get();
        $xa = DB::table('tbl_xaphuongthitran')->get();
        $quan = DB::table('tbl_quanhuyen')->get();
        return view('admin.delivery.add_delivery')
            ->with('all',$all)
            ->with('city',$city)
            ->with('tinh',$tinh)
            ->with('xa',$xa)
            ->with('quan',$quan);
    }
    public function select_delivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                $output.='<option>---Chọn quận huyện---</option>';
                foreach($select_province as $key => $province){
                    $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }

            }else{

                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output.='<option>---Chọn xã phường---</option>';
                foreach($select_wards as $key => $ward){
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
            echo $output;
        }

    }
    public function delete_feeship(Request $request,$id)
    {
        $all = Feeship::find($id);
        $all->delete();
        return Redirect::back()->with('message','Xóa thành công');
    }
}
