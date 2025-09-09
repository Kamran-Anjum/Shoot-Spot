<?php

namespace App\Http\Controllers;

use App\Models\Photography_equipment;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;

class PhotographyEquipmentController extends Controller
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
         $equipment = Photography_equipment::orderBy('id','desc')->get(); 
        return view('admin.equipment.view-equipment',compact('equipment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.equipment.add-equipment');
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
                 DB::table('photography_equipments')->insert([
                    ['name' => $request->name[$key],'isactive' => $active[$counter]],
                ]);

           }
        return redirect('admin/equipment')->with('flash_message_success','3D Photography Equipment added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photography_equipment  $photography_equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Photography_equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photography_equipment  $photography_equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Photography_equipment $equipment)
    {
    
        // dd($equipment);
         return view('admin.equipment.edit-equipment',compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photography_equipment  $photography_equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photography_equipment $equipment)
    {
        $code=$equipment;
        $result=$code->update([
                    'name'=>$request->name,
                    'isactive'=>$request->isactive,

        ]);
         if ($result) {
         return redirect('admin/equipment')->with('flash_message_success','Equipment Updated. '  );
        }
        else{
         return redirect('admin/equipment')->with('flash_message_error','Opps!...Equipment not Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photography_equipment  $photography_equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photography_equipment $equipment)
    {
        $result=$equipment->delete();

         if ($result) {
         return redirect()->back()->with('flash_message_success','Equipment Deleted '  );
        }
        else{
         return redirect()->back()->with('flash_message_error','Opps!...Equipment Request not Deleted');
        }
    }
}
