<?php

namespace App\Http\Controllers;

use App\Models\Places;
use App\Models\sections;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.places.admin-show-places');

    }
    public function indexUser()
    {
        $user = Auth::user();
        $places = Places::withCount('sections')->where('users_id', $user->id)->orderBy('id', 'ASC')->get();
        return view('vendor.places.show',compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.places.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'places_name'=>'required|max:255',
            'address'=>'required|max:255',
            'description'=>'required|max:255',
            'city'=>'required|max:15',
            'places_logo'=>'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if ($request->hasFile('places_logo')) {
            $imageuploaded = request()->file('places_logo');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/images/places');
            $imageuploaded->move($imagepath, $imagename);
            $input['places_logo'] = $imagename;
        }
        $input['users_id'] = Auth::user()->id;
//        $input['services'] = implode(' , ', (array)$request->services);

        Places::create($input);

        session()->flash('Add', 'تم اضافة المرفق بنجاح');
        return redirect('user/places')->with('success-create', 'تم اضافة المكان بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Places  $places
     * @return \Illuminate\Http\Response
     */
    public function show(Places $places)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Places  $places
     * @return \Illuminate\Http\Response
     */
    public function edit(Places $places,$id)
    {
        $user = Auth::user();
        $Places = Places::find($id);
        return view('vendor.places.edit', compact('Places'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Places  $places
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Places $places,$id)
    {
        $request->validate([
            'places_name'=>'required|max:255',
            'address'=>'required|max:255',
            'description'=>'required|max:255',
            'city'=>'required|max:15',
            'places_logo'=>'mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($request->hasFile('places_logo')) {
            $imageuploaded = request()->file('places_logo');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/images/places');
            $imageuploaded->move($imagepath, $imagename);
            $input['places_logo'] = $imagename;
        }
        Places::find($id)->update($input);
        session()->flash('edit', '  تم تعديل القسم بنجاج  ');
        return redirect('user/places')->with('success-edit', 'تم تعديل بيانات المكان بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Places  $places
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Places $places)
    {
        $user = Auth::user();
        $id = $request->id;
        Places::find($id)->delete();
        session()->flash('delete', 'تم حذف القسم بنجاح');
        return redirect('user/places')->with('success-delete', 'تم حذف المكان بنجاح');
    }
    public function getDetails(Request $request,$id)
    {
        $user = Auth::user();
        $sections = sections::where('places_id',$id)->where('users_id', $user->id)->orderBy('id', 'ASC')->get();
        $places = Places::where('id',$id)->first();
        return view('vendor.sections.index',compact('sections','places'));
    }
}
