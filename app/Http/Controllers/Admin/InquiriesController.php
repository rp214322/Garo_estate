<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class InquiriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Inquiry $inquiry)
    {
        if($request->ajax())
        {
            $inquiry = $inquiry::with(['user','property'])->orderBy('id','ASC');
            return Datatables::eloquent($inquiry)
            ->addColumn('type', function ($inquiry){
                            return $inquiry->property_id ? "Property" : "Normal";
                        })
                        ->editColumn('property', function ($inquiry){
                            return $inquiry->property ? $inquiry->property->title : '-';
                        })
                        ->editColumn('name', function ($inquiry) {
                            return $inquiry->first_name." ".$inquiry->last_name;
                        })
                        ->editColumn('email', function ($inquiry) {
                            return $inquiry->email;
                        })
                        ->editColumn('phone', function ($inquiry) {
                            return $inquiry->contact_no;
                        })
                        ->editColumn('status', function ($inquiry){
                            $status = $inquiry->status ? '<span class="badge badge-success">Answered</span>' : '<span class="badge badge-secondary">Pending</span>';
                            $status .= ' <div class="btn-group"><button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Change Status</button>' .
                                    '<div class="dropdown-menu dropdown-menu-right">' .
                                        '<a href="javascript:void(0);" class="dropdown-item change_status" data-id="' . $inquiry->id . '" data-status="1">Answered</a>' .
                                        '<a href="javascript:void(0);" class="dropdown-item change_status" data-id="' . $inquiry->id . '" data-status="0">Pending</a>' .
                                    '</div> ';
                            return $status;
                        })
                        ->editColumn('created', function ($inquiry){
                            return Carbon::parse($inquiry->created_at)->format('Y-m-d H:i:s');
                        })

                        ->addColumn('action', function (Inquiry $inquiry) {

                            $editBtn = '<div class="dropdown"><a class="btn btn-user font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i></a><div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';
                            $editBtn .= '<a href="javascript:;" class="dropdown-item btn-delete" data-url="'.route('admin.inquiries.destroy',$inquiry->id).'" data-method="delete"><i class="dw dw-delete-3"></i> Delete</a></div>';
                            return $editBtn;

                        })
                        ->rawColumns(["status", "action"])
                        ->make(true);
        }
        else {
            return view()->make('admin.inquiries.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inquiry = Inquiry::find($id);
        return view()->make('admin.inquiries.edit',compact('inquiry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $inquiry = Inquiry::find($id);
            $inquiry->delete();
            return response()->json(['success','inquiry deleted successfully'], 200);
        }
        catch(\Exception $e)
        {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $inquiry = Inquiry::find($request->id);
            $inquiry->status = $request->get('status');
            $inquiry->save();
            return response()->json(['success','Inquiry Status updated successfully'], 200);
        } catch(\Exception $e) {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }
}
