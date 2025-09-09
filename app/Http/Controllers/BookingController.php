<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Exception;
use Validator;
use Image;
use DateTime;
use App\Models\User;
use App\Models\Customer;
use App\Models\Package_request;
use App\Models\Photographer;
use App\Models\Photographer_project;
use App\Models\Project_images;
use App\Models\Notification;
use App\Models\Promo_code;
use App\Models\Shoot_for;
use App\Models\Spaces_photographed;
use App\Models\Booking;

class BookingController extends Controller
{
	// show to admin panel
	public function viewbooking()
    {
    	$bookings = DB::table('bookings as b')
                    ->join('users as u', 'b.user_id', '=', 'u.id')
                    ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                    ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                    ->select('b.*', 'u.name as userName', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                    ->orderBy('b.id', 'desc')
                    ->get();

    	return view('admin.booking.view-booking')->with(compact('bookings'));

    }

    public function viewbookingdetails($booking_id)
    {
        $booking = DB::table('bookings as b')
                    ->join('users as u', 'b.user_id', '=', 'u.id')
                    ->join('customers as c', 'b.user_id', '=', 'c.user_id')
                    ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                    ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                    ->select('b.*', 'c.*', 'u.name as userName', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                    ->where(['b.id'=>$booking_id])
                    ->first();

        return view('admin.booking.view-detail')->with(compact('booking'));

    }

    public function sendquote(Request $request, $booking_id)
    {
        $user = Auth::user();
        $user_admin_id = $user->id;

        if($request->isMethod('post')){

            $data = $request->all();
            
            $qoute = Booking::where(['id'=>$booking_id])->update([
                'amount' => $data['quote'] ." AED",
                'total_amount' => $data['quote']." AED",
                'status' => "Qoute Send"
            ]);

            $send_noti = new Notification();
            $send_noti->send_by = $user_admin_id;
            $send_noti->send_to = $data['user_id'];
            $send_noti->description = "Dear ".$data['user_name'].", Your Quote is ".$data['quote']." AED Against this BookingID ".$data['booking_id'];
            $send_noti->status = 0;
            $send_noti->booking_id = $booking_id;
            $send_noti->save();


            return redirect('/admin/view-bookings')->with('flash_message_success', 'Send Qoute Successfully!');

        }

        $booking = DB::table('bookings as b')
                    ->join('users as u', 'b.user_id', '=', 'u.id')
                    ->join('customers as c', 'b.user_id', '=', 'c.user_id')
                    ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                    ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                    ->select('b.*', 'c.*', 'u.name as userName', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                    ->where(['b.id'=>$booking_id])
                    ->first();

        return view('admin.booking.send-quote')->with(compact('booking', 'booking_id'));

    }

    public function assignphotographer(Request $request, $booking_id)
    {
        $user = Auth::user();
        $user_admin_id = $user->id;

        if($request->isMethod('post')){

            $data = $request->all();

            $photographer = $data['photographer'];

            $r_info = explode('|', $photographer);
            $user_photographer_id = $r_info[0];
            $user_photographer_name = $r_info[1];
            
            $qoute = Booking::where(['id'=>$booking_id])->update([
                'user_photographer_id' => $user_photographer_id,
                'user_photographer_name' => $user_photographer_name,
                'status' => "Photographer Assigned"
            ]);

            return redirect('/admin/view-bookings')->with('flash_message_success', 'Photographer Assigned Successfully!');

        }

        $booking = DB::table('bookings as b')
                    ->join('users as u', 'b.user_id', '=', 'u.id')
                    ->join('customers as c', 'b.user_id', '=', 'c.user_id')
                    ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                    ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                    ->select('b.*', 'c.*', 'u.name as userName', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                    ->where(['b.id'=>$booking_id])
                    ->first();

        $photographers = DB::table('photographers as p')
                        ->join('users as u', 'p.user_id', '=', 'u.id')
                        ->select('p.*', 'u.name as userName')
                        // ->where(['b.id'=>$booking_id])
                        ->get();

        return view('admin.booking.assign-photographer')->with(compact('booking', 'booking_id', 'photographers'));

    }

    public function addloyaltypoints(Request $request, $booking_id)
    {
        $user = Auth::user();
        $user_admin_id = $user->id;

        if($request->isMethod('post')){

            $data = $request->all();

            $get_customer = Customer::where(['user_id'=>$data['user_id']])->first();

            $cur_loy_point = $get_customer->loyalty_points;

            $new_points = $cur_loy_point+$data['loyalty_points'];

            // dd($cur_loy_point, $new_points);
            
            $update = Customer::where(['user_id'=>$data['user_id']])->update([
                'loyalty_points' => $new_points
            ]);

            $qoute = Booking::where(['id'=>$booking_id])->update([
                'loyalty_points_to_user' => $data['loyalty_points'],
            ]);

            return redirect('/admin/view-bookings')->with('flash_message_success', 'Loyalty Points Added Successfully!');

        }

        $booking = DB::table('bookings as b')
                    ->join('users as u', 'b.user_id', '=', 'u.id')
                    ->join('customers as c', 'b.user_id', '=', 'c.user_id')
                    ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                    ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                    ->select('b.*', 'c.*', 'u.name as userName', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                    ->where(['b.id'=>$booking_id])
                    ->first();

        return view('admin.booking.add-loyalty-points')->with(compact('booking', 'booking_id'));

    }

    // web front part
    public function createbookingweb(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;

        if($request->isMethod('post') ){

            $data = $request->all();

            // dd($data);

            $selected_date = DateTime::createFromFormat("U", strtotime($data['full_date']));
            $year=$selected_date->format('Y');
            $month=$selected_date->format('M');
            $week=$selected_date->format('W');
            $day=$selected_date->format('l');
            $date=$selected_date->format('d');

            $chk_booking_year = DB::table('bookings')->latest()->first();

            if (empty($chk_booking_year->booking_no) || $year > $chk_booking_year->year ) {
                $booking_no = "1";
            } else {
                $booking_no = $chk_booking_year->booking_no + 1;
            }

            $booking_code = 'ID'.date("Ymd");

            $time = $day." ".$month." ".$date." ".$year." ".$data['time'];

            $booking = new Booking();
            $booking->booking_code = $booking_code;
            $booking->booking_no = $booking_no;
            $booking->location = $data['location'];
            $booking->longitude = $data['longitude'];
            $booking->latitude = $data['latitude'];
            $booking->full_date = $data['full_date'];
            $booking->year = $year;
            $booking->month = $month;
            $booking->week = $week;
            $booking->date = $date;
            $booking->day = $day;
            $booking->time = $time;
            $booking->details = $data['details'];
            $booking->status = "Requested";
            $booking->user_id = $user_id;
            $booking->shoot_for_id = $data['shoot_for_id'];
            $booking->package_request_id = $data['package_request_id'];
            $booking->save();

            if ($booking) {

                return redirect('/customer/bookings')->with('flash_message_success', 'Booking Request Send Successfully!');

            }else{

                return redirect()->back()->with('flash_message_error', 'Booking Request Not Send!');

            }

        }
        
    }

    public function customerbookingcancelweb($booking_id)
    {

        $cancel = Booking::where(['id'=>$booking_id])->update([
            'status' => "Cancel Booking"
        ]);

        return redirect()->back()->with('flash_message_success', 'Booking Cancel Successfully!');
        
    }

    public function customerbookingconfirmweb(Request $request, $booking_id)
    {

        $data = $request->all();

        if ($request->isMethod('post')) {

            $confirm = Booking::where(['id'=>$booking_id])->update([
                'status' => "Confirm Booking",
                'promo_code' => $data['promo_code'],
                'redeem_loyalty_points' => $data['loyalty_points'],
                'details' => $data['details']
            ]);

            $get_booking_user = Booking::where(['id'=>$booking_id])->first();

            $user_book_id = $get_booking_user->user_id;

            $get_customer = Customer::where(['user_id'=>$user_book_id])->first();

            $cur_loy_point = $get_customer->loyalty_points;

            $new_points = $cur_loy_point-$data['loyalty_points'];

            // dd($cur_loy_point, $new_points);
            
            $update = Customer::where(['user_id'=>$user_book_id])->update([
                'loyalty_points' => $new_points
            ]);

            return redirect('/customer/notification')->with('flash_message_success', 'Booking Confirm Successfully!');
            
        }

        $booking = DB::table('bookings as b')
                    ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                    ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                    ->select('b.*', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                    ->where([ 'b.id' => $booking_id ])
                    ->first();

        return view('frontend.customer.confirm-booking')->with(compact('booking', 'booking_id'));

    }

    // customer create booking for qoute api part
    public function createbookingapi(Request $request)
	{

		$data = $request->all();

        if(!empty($data['user_id']) && !empty($data['location']) && !empty($data['full_date']) && !empty($data['time']) && !empty($data['shoot_for_id']) && !empty($data['package_request_id']) ){

        	$selected_date = DateTime::createFromFormat("U", strtotime($data['full_date']));
			$year=$selected_date->format('Y');
            $month=$selected_date->format('M');
            $week=$selected_date->format('W');
            $day=$selected_date->format('l');
            $date=$selected_date->format('d');

            $chk_booking_year = DB::table('bookings')->latest()->first();

            if (empty($chk_booking_year->booking_no) || $year > $chk_booking_year->year ) {
                $booking_no = "1";
            } else {
                $booking_no = $chk_booking_year->booking_no + 1;
            }

            $booking_code = 'ID'.date("Ymd");

        	$booking = new Booking();
            $booking->booking_code = $booking_code;
            $booking->booking_no = $booking_no;
            $booking->location = $data['location'];
            $booking->longitude = $data['longitude'];
            $booking->latitude = $data['latitude'];
            $booking->full_date = $data['full_date'];
            $booking->year = $year;
            $booking->month = $month;
            $booking->week = $week;
            $booking->date = $date;
            $booking->day = $day;
            $booking->time = $data['time'];
            $booking->details = $data['details'];
            $booking->status = "Requested";
            $booking->user_id = $data['user_id'];
            $booking->shoot_for_id = $data['shoot_for_id'];
            $booking->package_request_id = $data['package_request_id'];
            $booking->save();

            if ($booking) {

                $out = array();

		        $status = "request send successfully!";

		        $out[] = array("response"=>$status);

		        return[ "code" => "200", "msg" => $out];

            }else{

            	$out = array();

		        $status = "not send!";

		        $out[] = array("response"=>$status);

		        return[ "code" => "201", "msg" => $out];

            }

        }else{

            $out = array();

	        $status = "fields are required!";

	        $out[] = array("response"=>$status);

	        return[ "code" => "201", "msg" => $out];

        }
		
	}

    public function bookingshowtocustomerapi($user_id)
    {

        // counter query start
        $cur_date = date("Y-m-d");

        $ongoing_booking_count = Booking::where([ ['user_id', '=', $user_id], ['full_date', '=', $cur_date] ])->count();

        $upcoming_booking_count = Booking::where([ ['user_id', '=', $user_id], ['full_date', '>', $cur_date] ])->count();

        $complete_booking_count = Booking::where([ ['user_id', '=', $user_id], ['status', '=', "Completed"] ])->count();
        // counter query end

        // query for view attandance

        $ongoing_booking = DB::table('bookings as b')
                            ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                            ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                            ->select('b.*', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                            ->where([ ['b.user_id', '=', $user_id], ['b.full_date', '=', $cur_date] ])
                            ->orderBy('b.id', 'desc')
                            ->get();

        $upcoming_booking = DB::table('bookings as b')
                            ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                            ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                            ->select('b.*', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                            ->where([ ['b.user_id', '=', $user_id], ['b.full_date', '>', $cur_date] ])
                            ->orderBy('b.id', 'desc')
                            ->get();

        $complete_booking = DB::table('bookings as b')
                            ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                            ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                            ->select('b.*', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                            ->where([ ['user_id', '=', $user_id], ['status', '=', "Completed"] ])
                            ->orderBy('b.id', 'desc')
                            ->get();

        $ongoing = array();

        if ($ongoing_booking_count > 0) {

            foreach ($ongoing_booking as $booking) {

                $booking_id = $booking->booking_code.$booking->booking_no;
                $date = $booking->year."-".$booking->month."-".$booking->date;

                $ongoing[] = array(
                    "id"=>$booking->id,
                    "user_id"=>$booking->user_id,  
                    "booking_id"=>$booking_id, 
                    "location"=>$booking->location,
                    "longitude"=>$booking->longitude,
                    "latitude"=>$booking->latitude,
                    "date"=>$date,
                    "time"=>$booking->time,
                    "shootfor_name"=>$booking->shootfor_name,
                    "package_request"=>$booking->pck_req_name,
                    "status"=>$booking->status,
                );
                
            }
            
        }else{

            $ongoing[] = array(
                    "responce"=>"No Booking"
                );

        }  

        $upcoming = array();

        if ($upcoming_booking_count > 0) {

            foreach ($upcoming_booking as $booking) {

                $booking_id = $booking->booking_code.$booking->booking_no;
                $date = $booking->year."-".$booking->month."-".$booking->date;

                $upcoming[] = array(
                    "id"=>$booking->id,
                    "user_id"=>$booking->user_id,  
                    "booking_id"=>$booking_id, 
                    "location"=>$booking->location,
                    "longitude"=>$booking->longitude,
                    "latitude"=>$booking->latitude,
                    "date"=>$date,
                    "time"=>$booking->time,
                    "shootfor_name"=>$booking->shootfor_name,
                    "package_request"=>$booking->pck_req_name,
                    "status"=>$booking->status,
                );
                
            }
            
        }else{

            $upcoming[] = array(
                    "responce"=>"No Booking"
                );

        }           

        $complete = array();

        if ($complete_booking_count > 0) {

            foreach ($complete_booking as $booking) {

                $booking_id = $booking->booking_code.$booking->booking_no;
                $date = $booking->year."-".$booking->month."-".$booking->date;

                $complete[] = array(
                    "id"=>$booking->id,
                    "user_id"=>$booking->user_id,  
                    "booking_id"=>$booking_id, 
                    "location"=>$booking->location,
                    "longitude"=>$booking->longitude,
                    "latitude"=>$booking->latitude,
                    "date"=>$date,
                    "time"=>$booking->time,
                    "shootfor_name"=>$booking->shootfor_name,
                    "package_request"=>$booking->pck_req_name,
                    "status"=>$booking->status,
                );
                
            }
            
        }else{

            $complete[] = array(
                    "responce"=>"No Booking"
                );

        }    

        return[ "code" => "200", "ongoing_booking" => $ongoing, "upcoming_booking" => $upcoming, "complete_booking" => $complete];

    }

    public function bookingcancelapi(Request $request)
    {

        $data = $request->all();

        if (!empty($data['booking_id'])) {

            $cancel = Booking::where(['id'=>$data['booking_id']])->update([
                'status' => "Cancel Booking"
            ]);

            $out = array();

            $status = "cancel booking successfully!";

            $out[] = array("response"=>$status);

            return[ "code" => "200", "msg" => $out];
            
        } else {
            
            $out = array();

            $status = "fields are required!";

            $out[] = array("response"=>$status);

            return[ "code" => "201", "msg" => $out];

        }

    }

    public function bookigndetailsapi($booking_id)
    {

        $booking = DB::table('bookings as b')
                    ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                    ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                    ->select('b.*', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                    ->where([ 'b.id' => $booking_id ])
                    ->first();

        $out = array();

        $booking_id = $booking->booking_code.$booking->booking_no;
        $date = $booking->year."-".$booking->month."-".$booking->date;

        $out[] = array(
            "booking_id"=>$booking->id,
            "user_id"=>$booking->user_id,  
            "booking_no"=>$booking_id, 
            "location"=>$booking->location,
            "longitude"=>$booking->longitude,
            "latitude"=>$booking->latitude,
            "date"=>$date,
            "time"=>$booking->time,
            "shootfor_name"=>$booking->shootfor_name,
            "package_request"=>$booking->pck_req_name,
            "details"=>$booking->details,
            "quote"=>$booking->total_amount,
            "status"=>$booking->status,
        );
           

        return[ "code" => "200", "msg" => $out];

    }

    public function bookingconfirmapi(Request $request)
    {

        $data = $request->all();

        if (!empty($data['booking_id'])) {

            $confirm = Booking::where(['id'=>$data['booking_id']])->update([
                'status' => "Confirm Booking",
                'promo_code' => $data['promo_code'],
                'redeem_loyalty_points' => $data['loyalty_points'],
                'details' => $data['details']
            ]);

            $get_booking_user = Booking::where(['id'=>$data['booking_id']])->first();

            $user_book_id = $get_booking_user->user_id;

            $get_customer = Customer::where(['user_id'=>$user_book_id])->first();

            $cur_loy_point = $get_customer->loyalty_points;

            $new_points = $cur_loy_point-$data['loyalty_points'];

            // dd($cur_loy_point, $new_points);
            
            $update = Customer::where(['user_id'=>$user_book_id])->update([
                'loyalty_points' => $new_points
            ]);

            $out = array();

            $status = "confirm booking successfully!";

            $out[] = array("response"=>$status);

            return[ "code" => "200", "msg" => $out];
            
        } else {
            
            $out = array();

            $status = "fields are required!";

            $out[] = array("response"=>$status);

            return[ "code" => "201", "msg" => $out];

        }

    }

    public function bookingshowtophotographerongoingapi($user_id)
    {

        // counter query start
        $cur_date = date("Y-m-d");

        $ongoing_booking_count = Booking::where([ ['user_photographer_id', '=', $user_id], ['full_date', '=', $cur_date] ])->count();
        // counter query end

        // query for view attandance

        $ongoing_booking = DB::table('bookings as b')
                            ->join('customers as c', 'b.user_id', '=', 'c.user_id')
                            ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                            ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                            ->select('b.*', 'c.first_name as first_name', 'c.last_name as last_name','c.image as image', 'c.phone_code as code', 'c.phone_number as number', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                            ->where([ ['b.user_photographer_id', '=', $user_id], ['b.full_date', '=', $cur_date] ])
                            ->orderBy('b.id', 'desc')
                            ->get();

        $ongoing = array();

        if ($ongoing_booking_count > 0) {

            foreach ($ongoing_booking as $booking) {

                $booking_id = $booking->booking_code.$booking->booking_no;
                $date = $booking->year."-".$booking->month."-".$booking->date;
                $customer_name = $booking->first_name." ".$booking->last_name;
                $customer_number = $booking->code.$booking->number;

                if (!empty($booking->image)) {
                    $image = "https://bookvrapp.com/public/images/frontend-images/customer/".$booking->image;
                } else {
                    $image = null;
                }

                $ongoing[] = array(
                    "id"=>$booking->id,
                    "user_id"=>$booking->user_id, 
                    "customer_name"=>$customer_name,
                    "customer_number"=>$customer_number,
                    "image"=>$image, 
                    "booking_id"=>$booking_id, 
                    "location"=>$booking->location,
                    "longitude"=>$booking->longitude,
                    "latitude"=>$booking->latitude,
                    "date"=>$date,
                    "time"=>$booking->time,
                    "shootfor_name"=>$booking->shootfor_name,
                    "package_request"=>$booking->pck_req_name,
                    "quote"=>$booking->total_amount,
                    "status"=>$booking->status,
                    "details"=>$booking->details,
                );
                
            }
            
        }else{

            $ongoing[] = array(
                    "responce"=>"No Booking"
                );

        }          

        return[ "code" => "200", "msg" => $ongoing];

    }

    public function bookingshowtophotographerscheduleapi($user_id)
    {

        // counter query start
        $cur_date = date("Y-m-d");

        $schedule_booking_count = Booking::where([ ['user_photographer_id', '=', $user_id], ['full_date', '>', $cur_date] ])->count();
        // counter query end

        // query for view attandance

        $schedule_booking = DB::table('bookings as b')
                            ->join('customers as c', 'b.user_id', '=', 'c.user_id')
                            ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                            ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                            ->select('b.*', 'c.first_name as first_name', 'c.last_name as last_name','c.image as image', 'c.phone_code as code', 'c.phone_number as number', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                            ->where([ ['b.user_photographer_id', '=', $user_id], ['b.full_date', '>', $cur_date] ])
                            ->orderBy('b.id', 'desc')
                            ->get();

        $schedule = array();

        if ($schedule_booking_count > 0) {

            foreach ($schedule_booking as $booking) {

                $booking_id = $booking->booking_code.$booking->booking_no;
                $date = $booking->year."-".$booking->month."-".$booking->date;
                $customer_name = $booking->first_name." ".$booking->last_name;
                $customer_number = $booking->code.$booking->number;

                if (!empty($booking->image)) {
                    $image = "https://bookvrapp.com/public/images/frontend-images/customer/".$booking->image;
                } else {
                    $image = null;
                }

                $schedule[] = array(
                    "id"=>$booking->id,
                    "user_id"=>$booking->user_id, 
                    "customer_name"=>$customer_name,
                    "customer_number"=>$customer_number,
                    "image"=>$image, 
                    "booking_id"=>$booking_id, 
                    "location"=>$booking->location,
                    "longitude"=>$booking->longitude,
                    "latitude"=>$booking->latitude,
                    "date"=>$date,
                    "time"=>$booking->time,
                    "shootfor_name"=>$booking->shootfor_name,
                    "package_request"=>$booking->pck_req_name,
                    "quote"=>$booking->total_amount,
                    "status"=>$booking->status,
                    "details"=>$booking->details,
                );
                
            }
            
        }else{

            $schedule[] = array(
                    "responce"=>"No Booking"
                );

        }          

        return[ "code" => "200", "msg" => $schedule];

    }

    public function bookingshowtophotographerpastapi($user_id)
    {

        // counter query start
        $cur_date = date("Y-m-d");

        $past_booking_count = Booking::where([ ['user_photographer_id', '=', $user_id], ['status', '=', "Completed"] ])->count();
        // counter query end

        // query for view attandance

        $past_booking = DB::table('bookings as b')
                        ->join('customers as c', 'b.user_id', '=', 'c.user_id')
                        ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                        ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                        ->select('b.*', 'c.first_name as first_name', 'c.last_name as last_name','c.image as image', 'c.phone_code as code', 'c.phone_number as number', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                        ->where([ ['b.user_photographer_id', '=', $user_id], ['status', '=', "Completed"] ])
                        ->orderBy('b.id', 'desc')
                        ->get();

        $past = array();

        if ($past_booking_count > 0) {

            foreach ($past_booking as $booking) {

                $booking_id = $booking->booking_code.$booking->booking_no;
                $date = $booking->year."-".$booking->month."-".$booking->date;
                $customer_name = $booking->first_name." ".$booking->last_name;
                $customer_number = $booking->code.$booking->number;

                if (!empty($booking->image)) {
                    $image = "https://bookvrapp.com/public/images/frontend-images/customer/".$booking->image;
                } else {
                    $image = null;
                }

                $past[] = array(
                    "id"=>$booking->id,
                    "user_id"=>$booking->user_id, 
                    "customer_name"=>$customer_name,
                    "customer_number"=>$customer_number,
                    "image"=>$image, 
                    "booking_id"=>$booking_id, 
                    "location"=>$booking->location,
                    "longitude"=>$booking->longitude,
                    "latitude"=>$booking->latitude,
                    "date"=>$date,
                    "time"=>$booking->time,
                    "shootfor_name"=>$booking->shootfor_name,
                    "package_request"=>$booking->pck_req_name,
                    "quote"=>$booking->total_amount,
                    "status"=>$booking->status,
                    "details"=>$booking->details,
                );
                
            }
            
        }else{

            $past[] = array(
                    "responce"=>"No Booking"
                );

        }          

        return[ "code" => "200", "msg" => $past];

    }

    public function photographerbookingcheckinapi(Request $request)
    {

        $data = $request->all();

        if (!empty($data['booking_id'])) {

            // $chk_in = date("Y-m-d H:i A");

            $cancel = Booking::where(['id'=>$data['booking_id']])->update([
                'status' => "Completed",
                'user_photographer_check_in' => $data['check_in']
            ]);

            $out = array();

            $status = "booking check in successfully!";

            $out[] = array("response"=>$status);

            return[ "code" => "200", "msg" => $out];
            
        } else {
            
            $out = array();

            $status = "fields are required!";

            $out[] = array("response"=>$status);

            return[ "code" => "201", "msg" => $out];

        }

    }
}
