<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Auth;
use Cookie;
use Former;
use Validator;

class AuthController extends Controller
{
    public function getLogin()
    {
    	if(!Auth::guest())
    	{
    		return redirect()->route('admin.dashboard')->with('info','You are already logged in !!');
    	}
    	elseif(Cookie::get('auth_remember'))
    	{
    		$user_id = Crypter::decrypt(Cookie::get('auth_remember'));
    		Auth::login($user_id);
    		return redirect()->route('admin.dashboard')->with('success','You have logged in successfully.');
    	}
    	return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'email';
        $value=$request->get('email');
        $credentials = array($field=>$value, 'password' => $request->get('password'),'role'=>'admin');
        if (Auth::attempt($credentials))
        {
            return redirect()->route('admin.dashboard')->with('success','You have logged in successfully.');
        }
        else
        {
            return redirect()->back()->with('error',"Invalid email or password.")->withInput($request->except('password'));
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    public function getProfile()
    {
        $user = User::find(Auth::user()->id);
        Former::populate($user);
        return view('admin.auth.profile',compact('user'));
    }
    public function postProfile(Request $request)
    {
        $rules=[
        	'name' => 'required|max:30',
        	'email' => 'required|email|max:255'
        ];
        $messages=[
        	'name.required' => 'Please enter name',
        	'email.required' => 'Please enter email',
        	'email.email' => 'Please enter valid email'
        ];
        $validator = Validator::make($request->all(),$rules ,$messages);
        if ($validator->fails()) {
            Former::withErrors($validator);
            return redirect()->back()->withErrors($validator)->withInput()->with('error','Please correct following errors');
        }
        $user = Auth::user();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();
        return redirect()->back()->with('success','Profile updated successfully');
    }
    public function getPassword()
    {
        return view('admin.auth.password');
    }
    public function postPassword(Request $request)
    {
        $rules = array(
            'old_password'  => array('required'),
            'password'  => array('required','min:6','max:20','confirmed','different:old_password'),
            'password_confirmation'=>array('required','alpha_num')
            );
        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->with('error','Please correct following errors');
        }
        else
        {
            $current_password = Auth::user()->password;
            $old_password = $request->get('old_password');
            if(Hash::check($old_password,$current_password))
            {
                $new_pass = Hash::make($request->get('password'));
                $user = User::find(Auth::user()->id);
                $user->password = $new_pass;
                $user->save();
                return redirect()->back()->with('success','Your password successfully changed');
            }
            else
            {
                return redirect()->back()->with('error','Please enter correct old password');
            }
        }
    }
}
