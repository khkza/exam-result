<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Township;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionController extends Controller
{
    public function show($id)
    {
        $region = Region::findOrFail($id); // Assuming Region model exists with 'name' field
        return response()->json($region);
    }
    public function index()
    {
        $regions = Region::all(); // Fetch all regions from the database
        return response()->json($regions);
    }
    public function township()
    {
        $regions = Township::all(); // Fetch all regions from the database
        return response()->json($regions);
    }
    public function town($id)
    {
        $township = Township::findOrFail($id); // Assuming Region model exists with 'name' field
        return response()->json($township);
    }
    public function resultlist(Request $request){

        $keyword = $request->search;

        logger($keyword);
       $results = Region::query()->when($request->search != 'undefined', function($q) use ($keyword){
        // $q->where('', $keyword);
        $q->where('region_id', 'ilike', '%' . $keyword. '%');

    })->get();

       return $results;
    }
}
