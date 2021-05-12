<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainEntry;
use App\Models\User;
use Session;
use Auth;

class CostEstimateFormController extends Controller
{

    public function index(Request $request){     
        return view('estimate_form.index');
    }

    public function getResults(Request $request){
        $elements = MainEntry::filter(request(['category']))->orderBy('id','asc')->get();
        $total = 0 ;
        foreach($elements as $element){
            if(!empty($request->quantity_sq_ft)) $element->element_cost = $element->cost_sf * $request->quantity_sq_ft;
            else $element->element_cost = 0 ;
            $total += $element->element_cost;
        }
        $data = array(
            'elements'=>$elements,
            'total'=>$total
        );
        return response()->json(['data'=>$data],200);
    }
}
