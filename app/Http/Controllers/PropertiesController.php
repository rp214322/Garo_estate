<?php

namespace App\Http\Controllers;

use App\Models\FavouriteProperty;
use Illuminate\Http\Request;
use App\Models\Property;
use Auth;
class PropertiesController extends Controller
{
     /**
     * Vehical List page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Property(Request $request)
    {
        $request->per_page = $request->has('per_page') ? $request->get('per_page') : 10;
        $request->sort_by = $request->has('sort_by') ? $request->get('sort_by') : 'desc';
        $query = Property::query();
        $query->when($request->category_id,function($q) use($request){
            $q->whereIn('category_id',$request->category_id);
        })
        ->when($request->area_id,function($q) use($request){
            $q->where('area_id',$request->area_id);
        })
        ->when($request->search,function($q) use($request){
            $q->where('title','LIKE','%'.$request->search.'%');
        })
        ->when($request->bhk,function($q) use($request){
            $q->whereBetween('bhk',explode(",",$request->bhk));
        })
        ->when($request->bathrooms,function($q) use($request){
            $q->whereBetween('bathrooms',explode(",",$request->bathrooms));
        })
        ->when($request->price,function($q) use($request){
            $q->whereBetween('price',explode(",",$request->price));
        });
        $properties = $query->orderBy('price',$request->sort_by)->paginate($request->per_page);
        $favourite_properties = Auth::check() ? Auth::user()->favourite_properties()->pluck('property_id')->toArray() : [];
        return view('property',compact('properties','favourite_properties','request'));
    }

     /**
     * Vehical Details page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function viewproperty(Request $request, $slug)
    {
        $property = Property::where('slug',$slug)->latest()->first();
        return view('viewproperty',compact('property'));
    }

    public function FavouriteProperty($id){
    try {
        $fav_property = FavouriteProperty::where('user_id', Auth::user()->id)->where('property_id', $id)->first();
        if ($fav_property) {
            $fav_property->delete();
            return response()->json(['success','Property removed from favourite list.'], 200);
        } else {
            $fav_property = new FavouriteProperty();
            $fav_property->user_id=Auth::user()->id;
            $fav_property->Property_id=$id;
            $fav_property->save();
            return response()->json(['success','Property added from favourite list.'], 200);
        }
    } catch(\Exception $e) {
        return response()->json(['error',$e->getMessage()], 500);
    }
}
}
