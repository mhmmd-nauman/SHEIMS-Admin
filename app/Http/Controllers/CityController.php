<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{
    //
    public function index(){
        $cities = City::all();
        return $cities;
    }
    public function store(Request $request)
    {
        $city = City::create($request->all());
        // we need to propogate that city to other services
        $req = \Http::post("http://localhost:8000/api/city/add",[
            'id' => $city->id,
            'country' => $request->input('country'),
            'region' => $request->input('region'),
            'title' => "what ".$request->input('title')
        ]);
        if($req->failed()){
            return response("it failed",Response::HTTP_CREATED);
        }
        return response($city,Response::HTTP_CREATED);
    }
    public function call_v1(){
        $posts = \Http::get("http://localhost:8000/api/posts");
        return response($posts,Response::HTTP_OK);
    }
    /*
    public function add(Request $request)
    {
        $city = new City([
            'country' => $request->input('country'),
            'region' => $request->input('region'),
            'title' => $request->input('title'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'is_division' => $request->input('is_division'),
            'is_district' => $request->input('is_district'),
            'is_tehsil' => $request->input('is_tehsil'),
            'district_id' => $request->input('district_id'),
            'division_id' => $request->input('division_id')
        ]);
        $city->save();
  
        return response()->json('city successfully added');
    }
    public function edit($id)
    {
        $city = City::find($id);
        return response()->json($city);
    }
     */
    // update
    public function update($id, Request $request)
    {
        $city = City::find($id);
        $city->update($request->all());
  
        return response($city,Response::HTTP_ACCEPTED);
    }
  
    // delete
    public function destroy($id)
    {
        $city = City::destroy($id);
        //$city->delete();
  
        return response(null,Response::HTTP_NO_CONTENT);
    }
}