<?php

namespace App\Http\Controllers;

use App\Models\Package_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageRequestController extends Controller
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
         $request = Package_request::orderBy('id','desc')->get(); 
        return view('admin.package-request.view-package-request',compact('request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.package-request.add-package-request');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $counter=0;
        $active[]=null;
        // dd($request);
        for($i=0;$i<5;$i++){
            if (!empty($request->isactive[$i])) {
                $active[$counter]=$request->isactive[$i];
            }
            else{
            $counter++;
             }
        }
        
           foreach ($request->name as $key=>$item) {
                 DB::table('package_requests')->insert([
                    ['name' => $request->name[$key],'isactive' => $active[$key]],
                ]);

           }
        return redirect('admin/package-request')->with('flash_message_success','Package Request added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package_request  $package_request
     * @return \Illuminate\Http\Response
     */
    public function show(Package_request $package_request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package_request  $package_request
     * @return \Illuminate\Http\Response
     */
    public function edit(Package_request $package_request)
    {
        $request=$package_request;
        return view('admin.package-request.edit-package-request',compact('request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package_request  $package_request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package_request $package_request)
    {
        $code=$package_request;
        $result=$code->update([
                    'name'=>$request->name,
                    'isactive'=>$request->isactive,

        ]);
         if ($result) {
         return redirect('admin/package-request')->with('flash_message_success','Package Request Updated. '  );
        }
        else{
         return redirect('admin/package-request')->with('flash_message_error','Opps!...Package Request not Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package_request  $package_request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package_request $package_request)
    {
        $result=$package_request->delete();

         if ($result) {
         return redirect()->back()->with('flash_message_success','Package Request Deleted '  );
        }
        else{
         return redirect()->back()->with('flash_message_error','Opps!...Package Request not Deleted');
        }
    }
}
