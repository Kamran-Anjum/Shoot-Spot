<?php

namespace App\Http\Controllers;

use App\Models\Promo_code;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    public function __construct() 
   {
       $this->middleware('auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $code=Promo_code::orderBy('id','desc')->get();
         PromoCodeController::check($code);
        return view('admin.promo-code.view-promo-code',compact('code'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('admin.promo-code.add-promo-code');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $result= Promo_code::insert([
                    'code'=>$request->code,
                    'amount'=>$request->amount,
                    'active_from'=>$request->active_from,
                    'expire_date'=>$request->expire_date,
                    'type'=> $request->type,
                    'isactive'=>$request->isactive,

        ]);
         if ($result) {
         return redirect('admin/promo-code')->with('flash_message_success','Code added '  );
        }
        else{
         return redirect('admin/promo-code')->with('flash_message_error','Opps!...Code not Added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promo_code  $promo_code
     * @return \Illuminate\Http\Response
     */
    public function show(Promo_code $code)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promo_code  $promo_code
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo_code $promo_code)
    {  
        $code=$promo_code;
        // dd($code->code);
        return view('admin.promo-code.edit-promo-code',compact('code'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promo_code  $promo_code
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo_code $promo_code)
    {

        $code=$promo_code;
        $result=$code->update([
                    'code'=>$request->code,
                    'amount'=>$request->amount,
                    'active_from'=>$request->active_from,
                    'expire_date'=>$request->expire_date,
                    'type'=> $request->type,
                    'isactive'=>$request->isactive,

        ]);
         if ($result) {
         return redirect('admin/promo-code')->with('flash_message_success','Code Updated. '  );
        }
        else{
         return redirect('admin/promo-code')->with('flash_message_error','Opps!...Code not Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promo_code  $promo_code
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo_code $promo_code)
    {
         $result=$promo_code->delete();

         if ($result) {
         return redirect()->back()->with('flash_message_success','Code Deleted '  );
        }
        else{
         return redirect()->back()->with('flash_message_error','Opps!...Code not Deleted');
        }
    }

    //deactive expire code
    public function check($code){
        $todayDate = date("Y-m-d");
        
        foreach ($code as $key => $value) {
           
            if ($code[$key]->expire_date==$todayDate) {
                   $code[$key]->update([
                   'isactive'=>0,

                     ]);
                } 
             
        }
    }
}
