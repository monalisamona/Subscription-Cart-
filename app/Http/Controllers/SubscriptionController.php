<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Validator;
class SubscriptionController extends Controller
{
    public function addSubscriptions (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subscriptions' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }
         $subscriptions =  $request->input('subscriptions');
         $length = count($subscriptions);
        for($i = 0; $i<$length; $i++ ){
            $object = (object) $subscriptions[$i];
            $subsc = new Subscription();
            $subsc->order_id = rand();
            $subsc->product_id =$object->product_id;
            $subsc->package_id = $object->package_id;
            $subsc->total_amount = $object->total_amount;
            $subsc->save();
        }
        return response()->json( [ 'status'=> 200, 'message' => 'Subscriptions added successfully' ] );
    }

}
