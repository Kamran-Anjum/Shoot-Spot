<?php

namespace App\Http\Controllers;

require '../vendor/autoload.php';

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Http;
use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\Query;
use Google\Cloud\Firestore\QuerySnapshot;
use Google\Cloud\Firestore\DocumentReference;
use Google\Cloud\Firestore\CollectionReference;
use Google\Cloud\Core\Timestamp;
use Kreait\Firebase\Firestore;
use Session;
use DateTime;
use App\Models\User;
use App\Models\Customer;
use App\Models\Photographer;


class ChatController extends Controller
{

	public function photographerchatinitiate(Request $request, $user_id, $user_photographer_id)
	{

		// create main chat collection with dynamic chatID 
		$cur_date = date('Y-m-d h:i:s a');

		$selected_date = DateTime::createFromFormat("U", strtotime($cur_date));
        $year=$selected_date->format('Y');
        $month=$selected_date->format('M');
        $day=$selected_date->format('l');
        $date=$selected_date->format('d');

        $shortday = "";

        if ($day == "Monday") {
        	$shortday = "Mon";
        }elseif ($day == "Tuesday") {
        	$shortday = "Tue";
        }elseif ($day == "Wednesday") {
        	$shortday = "Wed";
        }elseif ($day == "Thursday") {
        	$shortday = "Thu";
        }elseif ($day == "Friday") {
        	$shortday = "Fri";
        }elseif ($day == "Saturday") {
        	$shortday = "Sat";
        }elseif ($day == "Sunday") {
        	$shortday = "Sun";
        }
        
        $time = date('h:i');

        $photographer = Photographer::where(['user_id'=>$user_photographer_id])->first();
        $photographer_name = $photographer->first_name." ".$photographer->last_name;
        $photographer_image = "https://bookvrapp.com/public/images/frontend-images/photographer/".$photographer->image;

        $customer = Customer::where(['user_id'=>$user_id])->first();
        $customer_name = $customer->first_name." ".$customer->last_name;
        $customer_image = "https://bookvrapp.com/public/images/frontend-images/customer/".$customer->image;

        $customer_id = intval($user_id);
        $photographer_id = intval($user_photographer_id);

        $timestamp = new Timestamp(new DateTime());

        $photographerarray = ['profilePicture'=>$photographer_image, 'userId'=>$photographer_id, 'userName'=>$photographer_name];
        $customerarray = ['profilePicture'=>$customer_image, 'userId'=>$customer_id, 'userName'=>$customer_name];
        $chatID = $user_photographer_id."_".$user_id;
        $lastMsgDate = $shortday." ".$month." ".$date." ".$time;
        $members = [$customer_id, $photographer_id];

        // chat initiate by photographer
        $firestore = new FirestoreClient([
	        'projectId' => 'bookvr-9981a',
	        'keyFile' => json_decode(file_get_contents(ENV('FIREBASE_CREDENTIALS')), true)
	    ]);

		$collection = $firestore->collection('chats');
		$document = $collection->document($chatID);

		$document->set([
			$user_photographer_id => $photographerarray,
			$user_photographer_id.'_read' => 0,
			$user_id => $customerarray,
			$user_id.'_read' => 0,
		    'chatId' => $chatID,
		    'lastMessage' => '',
		    'lastMsgDate' => $lastMsgDate,
		    'members' => $members,
		    'timestamp' => $timestamp,

		]);
		$snapshot = $document->snapshot();
		// ends here

		// get current chat
		$getmsg = $firestore->collection('chats')->document($chatID)->collection('messages');
		$query = $getmsg->orderBy('timestamp', 'ASC')->documents();

		$users = User::get();

		if($request->isMethod('post')){

            $data = $request->all();
            
            $message = $data['message'];

            // chat post by photographer
            $firestore = new FirestoreClient([
		        'projectId' => 'bookvr-9981a',
		        'keyFile' => json_decode(file_get_contents(ENV('FIREBASE_CREDENTIALS')), true)
		    ]);

            $collection = $firestore->collection('chats');
			$document = $collection->document($chatID);

			$member = [$photographer_id, $customer_id];
			$readBy = [$photographer_id];

			$time2 = date('h:i:s');

        	$m_time = $shortday." ".$month." ".$date." ".$time2." ".$year;

        	$milli = strtotime($timestamp);

			$msg = [ 
				'createdAt' => $milli,
				'members' => $member,
				'message' => $message,
				'readBy' => $readBy,
				'readers' => 1,
				'sender' => $photographer_id,
				'time' => $m_time,
				'timestamp' => $timestamp,
			];

			$doc = rand();

			$document->set( $document->collection('messages')->newDocument()->set($msg), [
				$user_photographer_id => $photographerarray,
				$user_photographer_id.'_read' => 0,
				$user_id => $customerarray,
				$user_id.'_read' => 0,
			    'chatId' => $chatID,
			    'lastMessage' => $message,
			    'lastMsgDate' => $lastMsgDate,
			    'members' => $members,
			    'timestamp' => $timestamp,

			]);


            return redirect()->back();

        }

		return view('frontend.photographer.chat')->with(compact('query', 'users'));
	}

	// photographer side message chat
	public function photographerchatwithuser(Request $request, $firestore_chat_id, $customer_id)
	{

		// create main chat collection with dynamic chatID 
		$cur_date = date('Y-m-d h:i:s a');

		$selected_date = DateTime::createFromFormat("U", strtotime($cur_date));
        $year=$selected_date->format('Y');
        $month=$selected_date->format('M');
        $day=$selected_date->format('l');
        $date=$selected_date->format('d');

        $shortday = "";

        if ($day == "Monday") {
        	$shortday = "Mon";
        }elseif ($day == "Tuesday") {
        	$shortday = "Tue";
        }elseif ($day == "Wednesday") {
        	$shortday = "Wed";
        }elseif ($day == "Thursday") {
        	$shortday = "Thu";
        }elseif ($day == "Friday") {
        	$shortday = "Fri";
        }elseif ($day == "Saturday") {
        	$shortday = "Sat";
        }elseif ($day == "Sunday") {
        	$shortday = "Sun";
        }
        
        $time = date('h:i');

        $user = Auth::user();
        $user_photographer_id = $user->id;
        $user_id = $customer_id;

        $photographer = Photographer::where(['user_id'=>$user_photographer_id])->first();
        $photographer_name = $photographer->first_name." ".$photographer->last_name;
        $photographer_image = "https://bookvrapp.com/public/images/frontend-images/photographer/".$photographer->image;

        $customer = Customer::where(['user_id'=>$user_id])->first();
        $customer_name = $customer->first_name." ".$customer->last_name;
        $customer_image = "https://bookvrapp.com/public/images/frontend-images/customer/".$customer->image;

        $customer_id = $user_id;
        $photographer_id = $user_photographer_id;

        // dd($user_id, $user_photographer_id);

        $timestamp = new Timestamp(new DateTime());

        $photographerarray = ['profilePicture'=>$photographer_image, 'userId'=>$photographer_id, 'userName'=>$photographer_name];
        $customerarray = ['profilePicture'=>$customer_image, 'userId'=>$customer_id, 'userName'=>$customer_name];
        $chatID = $user_photographer_id."_".$user_id;
        $lastMsgDate = $shortday." ".$month." ".$date." ".$time;
        $members = [$customer_id, $photographer_id];

        // chat initiate by photographer
        $firestore = new FirestoreClient([
	        'projectId' => 'bookvr-9981a',
	        'keyFile' => json_decode(file_get_contents(ENV('FIREBASE_CREDENTIALS')), true)
	    ]);

	    $collection = $firestore->collection('chats');
		$document = $collection->document($chatID);

		$document->set([
			$user_photographer_id => $photographerarray,
			$user_photographer_id.'_read' => 0,
			$user_id => $customerarray,
			$user_id.'_read' => 0,
		    'chatId' => $chatID,
		    'lastMessage' => '',
		    'lastMsgDate' => $lastMsgDate,
		    'members' => $members,
		    'timestamp' => $timestamp,

		]);
		$snapshot = $document->snapshot();
		// ends here

		// get current chat
		$getmsg = $firestore->collection('chats')->document($chatID)->collection('messages');
		$query = $getmsg->orderBy('timestamp', 'ASC')->documents();

		$users = User::get();

		if($request->isMethod('post')){

            $data = $request->all();
            
            $message = $data['message'];

            // chat post by photographer
            $firestore = new FirestoreClient([
		        'projectId' => 'bookvr-9981a',
		        'keyFile' => json_decode(file_get_contents(ENV('FIREBASE_CREDENTIALS')), true)
		    ]);

            $collection = $firestore->collection('chats');
			$document = $collection->document($chatID);

			$member = [$photographer_id, $customer_id];
			$readBy = [$photographer_id];

			$time2 = date('h:i:s');

        	$m_time = $shortday." ".$month." ".$date." ".$time2." ".$year;

        	$milli = strtotime($timestamp);

			$msg = [ 
				'createdAt' => $milli,
				'members' => $member,
				'message' => $message,
				'readBy' => $readBy,
				'readers' => 1,
				'sender' => $photographer_id,
				'time' => $m_time,
				'timestamp' => $timestamp,
			];

			$doc = rand();

			$document->set( $document->collection('messages')->newDocument()->set($msg), [
				$user_photographer_id => $photographerarray,
				$user_photographer_id.'_read' => 0,
				$user_id => $customerarray,
				$user_id.'_read' => 0,
			    'chatId' => $chatID,
			    'lastMessage' => $message,
			    'lastMsgDate' => $lastMsgDate,
			    'members' => $members,
			    'timestamp' => $timestamp,

			]);


            return redirect()->back();

        }

		return view('frontend.photographer.chat')->with(compact('query', 'users'));
	}

	// customer side message chat
	public function customerchatwithphotographer(Request $request, $firestore_chat_id, $photographer_id)
	{

		// create main chat collection with dynamic chatID 
		$cur_date = date('Y-m-d h:i:s a');

		$selected_date = DateTime::createFromFormat("U", strtotime($cur_date));
        $year=$selected_date->format('Y');
        $month=$selected_date->format('M');
        $day=$selected_date->format('l');
        $date=$selected_date->format('d');

        $shortday = "";

        if ($day == "Monday") {
        	$shortday = "Mon";
        }elseif ($day == "Tuesday") {
        	$shortday = "Tue";
        }elseif ($day == "Wednesday") {
        	$shortday = "Wed";
        }elseif ($day == "Thursday") {
        	$shortday = "Thu";
        }elseif ($day == "Friday") {
        	$shortday = "Fri";
        }elseif ($day == "Saturday") {
        	$shortday = "Sat";
        }elseif ($day == "Sunday") {
        	$shortday = "Sun";
        }
        
        $time = date('h:i');

        $user = Auth::user();
        $user_photographer_id = $photographer_id;
        $user_id = $user->id;

        $photographer = Photographer::where(['user_id'=>$user_photographer_id])->first();
        $photographer_name = $photographer->first_name." ".$photographer->last_name;
        $photographer_image = "https://bookvrapp.com/public/images/frontend-images/photographer/".$photographer->image;

        $customer = Customer::where(['user_id'=>$user_id])->first();
        $customer_name = $customer->first_name." ".$customer->last_name;
        $customer_image = "https://bookvrapp.com/public/images/frontend-images/customer/".$customer->image;

        $customer_id = $user_id;
        $photographer_id = $user_photographer_id;

        // dd($user_id, $user_photographer_id);

        $timestamp = new Timestamp(new DateTime());

        $photographerarray = ['profilePicture'=>$photographer_image, 'userId'=>$photographer_id, 'userName'=>$photographer_name];
        $customerarray = ['profilePicture'=>$customer_image, 'userId'=>$customer_id, 'userName'=>$customer_name];
        $chatID = $user_photographer_id."_".$user_id;
        $lastMsgDate = $shortday." ".$month." ".$date." ".$time;
        $members = [$customer_id, $photographer_id];

        // chat initiate by photographer
        $firestore = new FirestoreClient([
	        'projectId' => 'bookvr-9981a',
	        'keyFile' => json_decode(file_get_contents(ENV('FIREBASE_CREDENTIALS')), true)
	    ]);

	    $collection = $firestore->collection('chats');
		$document = $collection->document($chatID);

		$document->set([
			$user_photographer_id => $photographerarray,
			$user_photographer_id.'_read' => 0,
			$user_id => $customerarray,
			$user_id.'_read' => 0,
		    'chatId' => $chatID,
		    'lastMessage' => '',
		    'lastMsgDate' => $lastMsgDate,
		    'members' => $members,
		    'timestamp' => $timestamp,

		]);
		$snapshot = $document->snapshot();
		// ends here

		// get current chat
		$getmsg = $firestore->collection('chats')->document($chatID)->collection('messages');
		$query = $getmsg->orderBy('timestamp', 'ASC')->documents();

		// $rows = '';

		// foreach ($query as $key ) {
		// 	$rows = $key['message'];
		// 	$sn = $key['sender'];

		// 	// dd($rows, $sn);
		// }

		// dd($query, $snapshot, $rows);

		$users = User::get();

		if($request->isMethod('post')){

            $data = $request->all();
            
            $message = $data['message'];

            // chat post by photographer
            $firestore = new FirestoreClient([
		        'projectId' => 'bookvr-9981a',
		        'keyFile' => json_decode(file_get_contents(ENV('FIREBASE_CREDENTIALS')), true)
		    ]);

            $collection = $firestore->collection('chats');
			$document = $collection->document($chatID);

			$member = [$photographer_id, $customer_id];
			$readBy = [$photographer_id];

			$time2 = date('h:i:s');

        	$m_time = $shortday." ".$month." ".$date." ".$time2." ".$year;

        	$milli = strtotime($timestamp);

			$msg = [ 
				'createdAt' => $milli,
				'members' => $member,
				'message' => $message,
				'readBy' => $readBy,
				'readers' => 1,
				'sender' => $customer_id,
				'time' => $m_time,
				'timestamp' => $timestamp,
			];

			$doc = rand();

			$document->set( $document->collection('messages')->newDocument()->set($msg), [
				$user_photographer_id => $photographerarray,
				$user_photographer_id.'_read' => 0,
				$user_id => $customerarray,
				$user_id.'_read' => 0,
			    'chatId' => $chatID,
			    'lastMessage' => $message,
			    'lastMsgDate' => $lastMsgDate,
			    'members' => $members,
			    'timestamp' => $timestamp,

			]);


            return redirect()->back();

        }

		return view('frontend.customer.chat')->with(compact('query', 'users'));
	}

	
}
