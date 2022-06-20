<?php

namespace App\Http\Controllers;

use App\Models\Places;
use App\Models\sections;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.  admin-show-sections
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sections.admin-show-sections');
    }

    public function indexUser()
    {
        $user = Auth::user();
        $sections = sections::where('users_id', $user->id)->orderBy('id', 'ASC')->get();
        return view('vendor.sections.show',compact('sections'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = Auth::user();
        $places = Places::find($id);
        $services = Services::where('users_id', $user->id)->orderBy('id', 'ASC')->get();
        return view('vendor.sections.create', compact('places','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'sections_name'=>'required|max:255',
            'price'=>'required|integer|min:10|max:5000',
            'address'=>'required|max:255',
            'description'=>'required|max:300',
            'sections_logo'=>'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'type'=>'required',
            'status'=>'required',
            'date'=>'nullable|date_format:Y-m-d',
        ]);
        $input = $request->all();
        if ($request->hasFile('sections_logo')) {
            $imageuploaded = request()->file('sections_logo');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/images/sections');
            $imageuploaded->move($imagepath, $imagename);
            $input['sections_logo'] = $imagename;
        }
        $input['users_id'] = Auth::user()->id;
//        $input['places_id'] = Places::first()->id;
        $input['places_id'] = Places::find($id)->id;

        $input['services'] = implode(' , ', (array)$request->services);
        sections::create($input);

        return redirect('get/details/places/'.$id)->with('success-create', 'تم اضافة القسم بنجاح');    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\sections $sections
     * @return \Illuminate\Http\Response
     */
    public function show(sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\sections $sections
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $places = Places::find($id);
        $sections = sections::find($id);
        $services = Services::where('users_id', $user->id)->orderBy('id', 'ASC')->get();
        return view('vendor.sections.edit', compact('sections','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\sections $sections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sections $sections, $id)
    {
        $request->validate([
            'sections_name'=>'required|max:255',
            'price'=>'required|integer|min:10|max:5000',
            'address'=>'required|max:255',
            'description'=>'required|max:300',
            'sections_logo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type'=>'required',
            'status'=>'required',
            'date'=>'nullable|date_format:Y-m-d',
        ]);
        $input = $request->all();
        if ($request->hasFile('sections_logo')) {
            $imageuploaded = request()->file('sections_logo');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/images/sections');
            $imageuploaded->move($imagepath, $imagename);
            $input['sections_logo'] = $imagename;
        }
        $input['users_id'] = Auth::user()->id;
        $input['services'] = implode(' , ', (array)$request->services);
        sections::find($id)->update($input);
        return redirect('user/places')->with('success-edit', 'تم تعديل القسم بنجاج');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\sections $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, sections $sections,$id)
    {
        $user = Auth::user();
        $id = $request->id;
        sections::find($id)->delete();
        return redirect()->back()->with('success-delete', 'تم حذف القسم بنجاح');
    }

    public function getDetails(Request $request,$id)
    {
        $sections = sections::where('id',$id)->first();
        return view('vendor.sections.Show',compact('sections'));
    }
    public function getDetailsGuest(Request $request,$id)
    {
        $sections = sections::where('id',$id)->first();
        return view('ShowDataSections',compact('sections'));
    }

}
