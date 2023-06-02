<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Property;
use Illuminate\Support\Facades\Validator;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Property $properties)
    {
        if ($request->ajax()) {
            $properties = $properties->with(['category'])->orderBy('id', 'ASC');
            return Datatables::eloquent($properties)
                        ->editColumn('category', function ($properties) {
                            return $properties->category->name;
                        })
                        ->editColumn('title', function ($properties) {
                            $data = $properties->title;
                            $data .="<br>Address: ".$properties->address;
                            $data .="<br>Sq_ft: ".$properties->sq_ft;
                            $data .="<br>BHK: ".$properties->bhk;
                            $data .="<br>Bathrooms: ".$properties->bathrooms;
                            return $data;
                        })
                        ->editColumn('price', function ($properties) {
                            return $properties->price;
                        })
                        ->editColumn('status', function ($property) {
                            $status = $property->status ? '<span class="badge badge-success">Sold</span>' : '<span class="badge badge-secondary">UnSold</span>';
                            $status .= ' <div class="btn-group"><button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Change Status</button>' .
                                    '<div class="dropdown-menu dropdown-menu-right">' .
                                        '<a href="javascript:void(0);" class="dropdown-item change_status" data-id="' . $property->id . '" data-status="1">Sold</a>' .
                                        '<a href="javascript:void(0);" class="dropdown-item change_status" data-id="' . $property->id . '" data-status="0">UnSold</a>' .
                                    '</div> ';
                            return $status;
                        })
                        ->addColumn('action', function (Property $property) {
                            $editBtn = '<div class="dropdown"><a class="btn btn-user font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i></a><div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';
                            $editBtn .= '<a class="dropdown-item" href="'.route('admin.property.galleries.index',$property->id).'"><i class="dw dw-edit2"></i> Gallery</a>';
                            $editBtn .= '<a href="javascript:;" class="dropdown-item fill_data" data-url="'.route('admin.properties.edit', $property->id).'" data-method="get"><i class="dw dw-edit2"></i> Edit</a>';
                            $editBtn .= '<a href="javascript:;" class="dropdown-item btn-delete" data-url="'.route('admin.properties.destroy', $property->id).'" data-method="delete"><i class="dw dw-delete-3"></i> Delete</a></div>';
                            return $editBtn;
                        })
                        ->rawColumns(["title", "status", "action"])
                        ->make(true);
        } else {
            return view()->make('admin.properties.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view()->make('admin.properties.add', compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            "category_id" => "required",
            "title" => "required",
            "address" => "required",
            "area_id" => "required",
            "sq_ft" => "required",
            "price" => "required",
            "bhk" => "required",
            "bathrooms" => "required",
            "description" => "required",
            "amenities" => "required"

        );
        $message =[
            "category_id.required" => "Please select category",
            "title.required" => "Please enter title",
            "address.required" => "Please enter address",
            "area_id.required" => "Please enter area",
            "sq_ft.required" => "Please enter sq_ft",
            "price.required" => "Please enter price",
            "bhk.required" => "Please enter bhk",
            "bathrooms.required" => "Please enter numbers of bathrooms",
            "description.required" => "Please enter descripton",
            "amenities.required" => "Please enter amenities"
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return response()->json($validator->getMessageBag()->toArray(), 422);
        }
        try{
        $property= new Property();
        $property->category_id=$request->get('category_id');
        $property->title=$request->get('title');
        $property->address=$request->get('address');
        $property->area_id=$request->get('area_id');
        $property->sq_ft=$request->get('sq_ft');
        $property->price=$request->get('price');
        $property->bhk=$request->get('bhk');
        $property->bathrooms=$request->get('bathrooms');
        $property->description=$request->get('description');
        $property->amenities=json_encode($request->get('amenities'));
        $property->save();
        return response()->json(['success','Property created successfully.'], 200);
        }
        catch(\Exception $e)
            {
              return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view()->make('admin.properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find($id);
        return view()->make('admin.properties.edit',compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $rules = array(
            "category_id" => "required",
            "title" => "required",
            "address" => "required",
            "area_id" => "required",
            "sq_ft" => "required",
            "price" => "required",
            "bhk" => "required",
            "bathrooms" => "required",
            "description" => "required",
            "amenities" => "required"

        );
        $message =[
            "category_id.required" => "Please select category",
            "title.required" => "Please enter title",
            "address.required" => "Please enter address",
            "area_id.required" => "Please enter area",
            "sq_ft.required" => "Please enter sq_ft",
            "price.required" => "Please enter price",
            "bhk.required" => "Please enter bhk",
            "bathrooms.required" => "Please enter numbers of bathrooms",
            "description.required" => "Please enter descripton",
            "amenities.required" => "Please enter amenities"
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return response()->json($validator->getMessageBag()->toArray(), 422);
        }
        try {
            $property->category_id=$request->get('category_id');
            $property->title=$request->get('title');
            $property->address=$request->get('address');
            $property->area_id=$request->get('area_id');
            $property->sq_ft=$request->get('sq_ft');
            $property->price=$request->get('price');
            $property->bhk=$request->get('bhk');
            $property->bathrooms=$request->get('bathrooms');
            $property->description=$request->get('description');
            $property->amenities=json_encode($request->get('amenities'));

            $property->save();
            return response()->json(['success','Property Updated successfully.'], 200);
        } catch(\Exception $e) {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
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
            $user = Property::find($id);
            $user->delete();
            return response()->json(['success','Property deleted successfully'], 200);
        }
        catch(\Exception $e)
        {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }
    public function updateStatus(Request $request)
    {
        try {
            $property = Property::find($request->id);
            $property->status = $request->get('status');
            $property->save();
            return response()->json(['success','Property Status updated successfully'], 200);
        } catch(\Exception $e) {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }
}
