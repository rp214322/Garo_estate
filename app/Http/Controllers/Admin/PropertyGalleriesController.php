<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PropertyGalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $property_id)
    {
        if($request->ajax())
        {
            $photos = PropertyGallery::where('property_id',$property_id)->orderBy('id','ASC');
            return DataTables::eloquent($photos)
                        ->editColumn('file_name', function ($photo) {
                            return '<img src="'.$photo->file_url().'">';
                        })
                        ->editColumn('file_type', function ($photo) {
                            return $photo->file_type ;
                        })
                        ->editColumn('is_featured', function ($photo) {
                            $status = $photo->is_featured ? "True" : 'False';
                            return $status;
                        })
                       ->addColumn('action', function (PropertyGallery $photo) {
                            $editBtn = '<div class="dropdown"><a class="btn btn-user font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i></a><div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';
                            $editBtn .= '<a href="javascript:;" class="dropdown-item btn-delete" data-url="'.route('admin.property.galleries.update',[$photo->property_id,$photo->id]).'" data-method="patch"><i class="dw dw-edit2"></i> Make Featured</a>';
                            $editBtn .= '<a href="javascript:;" class="dropdown-item btn-delete" data-url="'.route('admin.property.galleries.destroy',[$photo->property_id,$photo->id]).'" data-method="delete"><i class="dw dw-delete-3"></i> Delete</a></div>';
                            return $editBtn;

                        })
                        ->rawColumns(["file_name","action"])
                        ->make(true);
        }
        else {
            return view()->make('admin.properties.galleries',compact('property_id'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$property_id)
    {
        // $request->validate([
        //     'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
        // $filename = time().'.'.$request->file->extension();
        // $request->file->move(public_path('file'), $filename);

        //  // Store the filename in the database
        // $file = new PropertyGallery();
        // $file->filename = $filename;
        // $file->save();
        // return response()->json(['success' => 'Successfully uploaded!', 'filename' => $filename]);
        $rules = array(
            'files' => 'required',
        );
        $messages = [
            'files.required' => 'Please select files.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
        {
            return response()->json($validator->getMessageBag()->toArray(), 422);
        }
        // try{
            foreach ($request->get('files') as $file) {
                $photo=new PropertyGallery();
                $photo->property_id = $property_id;
                $photo->file=$file['file'];
                $photo->file_type=$file['type'];
                $photo->save();
            }
            return response()->json(['success','PropertyGallery created successfully.'], 200);
        // }
        // catch(\Exception $e)
        // {
        //     return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $property_id, $id)
    {
        try{
            $phots = PropertyGallery::where('property_id',$property_id)->update(['is_featured' => false]);
            $photo = PropertyGallery::find($id);
            $photo->is_featured = true;
            $photo->save();
            return response()->json(['success','PropertyGallery updated successfully.'], 200);
        }
        catch(\Exception $e)
        {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($property_id,$id)
    {
        try
        {
            $photo = PropertyGallery::find($id);
            $photo->delete();
            return response()->json(['success','PropertyGallery deleted successfully'], 200);
        }
        catch(\Exception $e)
        {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }
}
