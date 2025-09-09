<?php

namespace App\Http\Controllers;

use App\Models\Spaces_photographed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
class SpacesPhotographedController extends Controller
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
         $space = Spaces_photographed::orderBy('id','desc')->get(); 
        return view('admin.space.view-space',compact('space'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.space.add-space');
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
        // dd($active);
              foreach ($request->name as $key=>$item) {
                 DB::table('spaces_photographeds')->insert([
                    ['name' => $request->name[$key],'isactive' => $active[$counter]],
                ]);

           }
        return redirect('admin/space')->with('flash_message_success','3D spaces Photographed added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spaces_photographed  $spaces_photographed
     * @return \Illuminate\Http\Response
     */
    public function show(Spaces_photographed $spaces_photographed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spaces_photographed  $spaces_photographed
     * @return \Illuminate\Http\Response
     */
    public function edit(Spaces_photographed $space)
    {
        return view('admin.space.edit-space',compact('space'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spaces_photographed  $spaces_photographed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spaces_photographed $space)
    {
        $result=$space->update([
                    'name'=>$request->name,
                    'isactive'=>$request->isactive,

        ]);
         if ($result) {
         return redirect('admin/space')->with('flash_message_success','3D Spaces Photographed Updated. '  );
        }
        else{
         return redirect('admin/space')->with('flash_message_error','Opps!...3D Spaces photographed not Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spaces_photographed  $spaces_photographed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spaces_photographed $space)
    {
        
        $result=$space->delete();

         if ($result) {
         return redirect()->back()->with('flash_message_success','3D spaces Photographed Deleted '  );
        }
        else{
         return redirect()->back()->with('flash_message_error','Opps!...3D Spaces Photographed not Deleted');
        }
    }
}
