<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Feedback;
use DB;

class DashboardController extends Controller
{
    public function index(){
        $imonths= [];
        $inquiry_month_data = Inquiry::select(DB::raw("COUNT(*) as count ,  MONTH(created_at) as month"))
        ->groupBy(DB::raw("month(created_at)"))
        ->pluck('count','month');
        for($i=1; $i<=12;$i++)
        {
            $imonths[] =  isset($inquiry_month_data[$i]) ? $inquiry_month_data[$i] : 0;
        }
        $fmonths= [];
        $feedback_month_data = Feedback::select(DB::raw("COUNT(*) as count ,  MONTH(created_at) as month"))
        ->groupBy(DB::raw("month(created_at)"))
        ->pluck('count','month');
        for($i=1; $i<=12;$i++)
        {
            $fmonths[] =  isset($feedback_month_data[$i]) ? $feedback_month_data[$i] : 0;
        }
        $data[] = array(
            'inquiry' => $imonths,
            'feedback' => $fmonths
        );
        $data = json_encode($data);
    return view('admin.dashboard',compact('data'));
}
}
