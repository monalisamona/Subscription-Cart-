<?php

namespace App\Http\Controllers;

use App\Models\package;
use Illuminate\Http\Request;
use Validator;
class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPackage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('')
                        ->withErrors($validator)
                        ->withInput();
        }
        $package = new package();
        $package->product_id = $request->input('product_id');
        $package->price = $request->input('price');
        $package->package_name = $request->input('name');
        if($package->save()) {
            $packages = package::all();
            return response()->json( [ 'package' => $packages, 'status'=> 200, 'message' => 'Product added successfully' ] );
        }else{
            return response()->json( ['status'=> 500, 'message' => 'Product added Failed' ] );
        }

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function getPackages(){
        $productId = $_GET['productId'];
        $packages  = Package::where('product_id', $productId)->get();
        return response()->json( [ 'packages' => $packages, 'status'=> 200 ] );
    }
    public function getPrice(){
        $packageId = $_GET['packageId'];
        $package  =  Package::where('id', $packageId)->first();
        return response()->json( [ 'package' => $package, 'status'=> 200 ] );
    }

}
