<?php

namespace App\Http\Controllers;

use App\Models\MainEntry;
use Illuminate\Http\Request;
use Route;
use Session;

class MainEntryController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {              
        $route_name =  request()->segment(2);
        $this->setSession($route_name);        
        $entries = MainEntry::where('category',Session::get('category'))->orderBy('id','desc')->paginate(30);                 
        return view('main_entry.index',compact('entries'));

    }

    public function setSession($route_name){              
        $category = '';       
        $title = '';
        switch($route_name){
            case 'low_concrete':
                $category = 1;
                $title = 'Low End Concrete Dwelling';              
                break;
            case 'high_concrete':
                $category = 2;
                $title = 'High End Concrete Dwelling';
               
                break;
            case 'low_timber':
                $category = 3;
                $title = 'Low End Timber Dwelling';
                
                break;
            case 'high_timber':
                $category = 4;
                $title = 'High End Timber Dwelling';               
                break;
            case 'ware_house':
                $category = 5;
                $title = 'Ware House';               
                break;
        }
        Session::put('title',$title);
        Session::put('category',$category);    
        Session::put('index_route_name',$route_name.'.index');    
        Session::put('create_route_name',$route_name.'.create');    
        Session::put('edit_route_name',$route_name.'.edit');
        Session::put('store_route_name',$route_name.'.store');
        Session::put('update_route_name',$route_name.'.update');
        Session::put('destroy_route_name',$route_name.'.destroy');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $route_name =  request()->segment(2);
        $this->setSession($route_name);      
        return view('main_entry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'cost_m2' => 'required',
            'unit_m2' => 'required',
            'cost_sf' => 'required',
            'unit_sf' => 'required',
            'element_code' => 'required',
        ]);
    
        MainEntry::create([
            'description'=>$request->description,
            'cost_m2'=>$request->cost_m2,
            'unit_m2'=>$request->unit_m2,
            'cost_sf'=>$request->cost_sf,
            'unit_sf'=>$request->unit_sf,
            'element_code'=>$request->element_code,
            'category'=>Session::get('category'),
        ]);
     
        return redirect()->route(Session::get('index_route_name'))
                        ->with('success','Successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainEntry  $mainEntry
     * @return \Illuminate\Http\Response
     */
    public function show(MainEntry $mainEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainEntry  $mainEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $route_name =  request()->segment(2);        
        $this->setSession($route_name);  
        $entry = MainEntry::find($id);      
        return view('main_entry.edit',compact('entry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainEntry  $mainEntry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'description' => 'required',
            'cost_m2' => 'required',
            'unit_m2' => 'required',
            'cost_sf' => 'required',
            'unit_sf' => 'required',
            'element_code' => 'required',
        ]);
        $entry = MainEntry::find($id);     
        $entry->description = $request->description;
        $entry->cost_m2 = $request->cost_m2;
        $entry->unit_m2 = $request->unit_m2;
        $entry->cost_sf = $request->cost_sf;
        $entry->unit_sf = $request->unit_sf;
        $entry->element_code = $request->element_code;
        $entry->save();
        return redirect()->route(Session::get('index_route_name'))
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainEntry  $mainEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entry = MainEntry::find($id);     
        $entry->delete();    
        return redirect()->route(Session::get('index_route_name'))
                        ->with('success','Successfully deleted');
    }
}
