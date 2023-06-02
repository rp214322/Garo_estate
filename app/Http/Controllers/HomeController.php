<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $favourite_properties = Auth::check() ? Auth::user()->favourite_properties()->pluck('property_id')->toArray() : [];
        return view('home',compact('favourite_properties'));
    }
    /**
     * Show the Contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Show the Contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function feedback()
    {
        return view('feedback');
    }

    public function StoreInquiry(Request $request)
	{
        // dd($request->all());
    	$rules = array(
              'first_name' => 'required',
              'last_name' => 'required',
              'email' => 'required|email',
              'phone'=> 'numeric',
              'description' => 'required'
          );
          $messages = array(
              'first_name.required' => 'Please enter your first name.',
              'last_name.required' => 'Please enter your last name.',
              'email.required' => 'Please enter your email address.',
              'email.email' => 'Please enter valid email address.',
              'contact_no.numeric' => 'Please enter only digits in phone number.',
              'description.required' => 'Please enter your description'
            );

          $validator = Validator::make($request->all(), $rules, $messages);
          if ($validator->passes()) {
            //   try {

                $inquiry = new Inquiry();
                $inquiry->property_id=$request->get('property_id');
                $inquiry->user_id=$request->get('user_id');
                $inquiry->first_name = $request->get('first_name');
                $inquiry->last_name = $request->get('last_name');
                $inquiry->email = $request->get('email');
                $inquiry->contact_no = $request->get('contact_no');
                $inquiry->description=$request->get('description');
                $inquiry->save();

                // Mail::send('emails.contact', ['data' => $request->all()], function($message) use($request) {
                //   $message->to(config()->get('settings.email'));
                //   $message->subject('Submission from ' . title_case($request->get('name')));
                // });
                // Mail::send('emails.thank_you', ['data' => $request->all()], function($message) use($request) {
                //   $message->to($request->get('email'));
                //   $message->subject('Thank you for contact us.');
                // });
                  return redirect()->back()->with('success','Thank you for contact us. We will get back to you soon.');
            //   } catch (Exception $e) {
            //       return redirect()->back()
            //                       ->withErrors($validator)
            //                       ->withInput()
            //                       ->with('error', $e->getMessage());
            //   }
          }

          return redirect()->back()
                          ->withErrors($validator)
                          ->withInput()
                          ->with('error','Please correct the following errors');
    }

    public function StoreFeedback(Request $request)
	{
        // dd($request->all());
    	$rules = array(
              'description' => 'required',
              'rating' => 'required',
          );
          $messages = array(
              'description.required' => 'Please enter your description',
              'rating.required' => 'Please give Rating'
            );

          $validator = Validator::make($request->all(), $rules, $messages);
          if ($validator->passes()) {
            //   try {

                $feedback = new Feedback;
                $feedback->user_id=Auth::user()->id;
                $feedback->description=$request->get('description');
                $feedback->rating=$request->get('rating');
                $feedback->save();

                // Mail::send('emails.contact', ['data' => $request->all()], function($message) use($request) {
                //   $message->to(config()->get('settings.email'));
                //   $message->subject('Submission from ' . title_case($request->get('name')));
                // });
                // Mail::send('emails.thank_you', ['data' => $request->all()], function($message) use($request) {
                //   $message->to($request->get('email'));
                //   $message->subject('Thank you for contact us.');
                // });
                return redirect()->back()->with('success','Thank you for feedback.');
                //   } catch (Exception $e) {
            //       return redirect()->back()
            //                       ->withErrors($validator)
            //                       ->withInput()
            //                       ->with('error', $e->getMessage());
            //   }
          }

          return redirect()->back()
                          ->withErrors($validator)
                          ->withInput()
                          ->with('error','Please correct the following errors');
    }

    public function terms(){
        return view('terms');
    }
}
