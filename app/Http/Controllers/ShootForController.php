<?php

namespace App\Http\Controllers;

use App\Models\Shoot_for;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ShootForController extends Controller
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
         $shoot = Shoot_for::orderBy('id','desc')->get(); 
        return view('admin.shoot-for.view-shoot-for',compact('shoot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shoot-for.add-shoot-for');
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
        for($i=0;$i<count($request->name);$i++){
            if (!empty($request->isactive[$i])) {
                $active[$counter]=$request->isactive[$i];
            }
            else{
            $counter++;
             }
        }
        
         foreach ($request->name as $key=>$item) {
                $filename =  Shoot_for::saveImage($request->image[$key]);
                 DB::table('shoot_fors')->insert([
                    ['name' => $request->name[$key],'image' => $filename,'isactive' => $active[$key]],
                ]);
        }

          return redirect('admin/shoot-for')->with('flash_message_success','Shoot added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shoot_for  $shoot_for
     * @return \Illuminate\Http\Response
     */
    public function show(Shoot_for $shoot_for)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shoot_for  $shoot_for
     * @return \Illuminate\Http\Response
     */
    public function edit(Shoot_for $shoot_for)
    {
        
        $shoot=$shoot_for;
        return view('admin.shoot-for.edit-shoot-for',compact('shoot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shoot_for  $shoot_for
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shoot_for $shoot_for)
    {

        $code=$shoot_for;
        // dd($code);
        $filename=Shoot_for::oldImage($code->id);
         if ($request->hasFile('image')) { 
                    //deleting previously stored images
                    Shoot_for::deleteOldImage($filename);
                     //saving new images
                    $filename =  Shoot_for::saveImage($request->image); 
        } 


        $result=$code->update([
                    'name'=>$request->name,
                    'isactive'=>$request->isactive,
                    'image'=>$filename,

        ]);
         if ($result) {
         return redirect('admin/shoot-for')->with('flash_message_success','Shoot Updated. '  );
        }
        else{
         return redirect('admin/shoot-for')->with('flash_message_error','Opps!...Shoot not Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shoot_for  $shoot_for
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shoot_for $shoot_for)
    {
        Shoot_for::deleteOldImage($shoot_for->image);
        $result=$shoot_for->delete();

         if ($result) {
         return redirect()->back()->with('flash_message_success','Shoot Deleted '  );
        }
        else{
         return redirect()->back()->with('flash_message_error','Opps!...Shoot not Deleted');
        }
    }
}
