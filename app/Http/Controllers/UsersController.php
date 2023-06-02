<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view('profile',compact('user'));
    }

    public function updateProfile(){
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id
            );
        $messages = [
            'first_name.required' => 'Please enter first name.',
            'last_name.required' => 'Please enter last name.',
            'email.required' => 'Please enter email address.',
            'email.email' => 'Please enter valid email address.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
        {
            return redirect()->back()->with($validator->getMessageBag()->toArray(), 422);
        }
        try
        {
            $user = User::find(Auth::user()->id);
            $user->first_name=$request->get('first_name');
            $user->last_name=$request->get('last_name');
            $user->phone=$request->get('phone');
            $user->email=$request->get('email');
            $user->save();
            return response()->json(['success','Profile updated successfully.'], 200);
        }
        catch(\Exception $e)
        {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }
    public function FavouriteList(){
        $properties = Property::whereIn('id',Auth::user()->favourite_properties()->pluck('property_id')->toArray())->get();
        return view('favourite_list',compact('properties'));
    }
}
