<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\Places;
use App\Models\sections;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Company = User::where('id', '!=', Auth::id())->orderBy('id', 'ASC')->get();
        return view('admin.companies.show',compact('Company'));

    }

    public function getPlaces($id)
    {
        $user = User::find($id);
        $Places = Places::withCount('sections')->where('users_id', $user->id)->orderBy('id', 'ASC')->get();
        $places = Places::where('id',$id)->first();
        return view('admin.places.show',compact('Places','places'));
    }

    public function getSections($id)
    {
        $user = User::find($id);
        $Sections = sections::where('places_id',$id)->orderBy('id', 'ASC')->get();
        $places = Places::where('id',$id)->first();
        return view('admin.sections.show',compact('Sections','places'));
    }

    public function getDetails(Request $request,$id)
    {

        $sections = sections::where('id',$id)->first();
        return view('vendor.sections.show',compact('sections'));
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
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(companies $companies,$id)
    {
        $user = Auth::user();
        $Companies = User::find($id);
        return view('admin.companies.edit', compact('Companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, companies $companies,$id)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:40'],
            'company_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'website' => ['required', 'url', 'max:255'],
            'city' => ['required','string', 'max:15'],
            'profile_photo_path' => ['image', 'mimes:jpg,jpeg,bmp,svg,png', 'max:2048'],
        ]);

        $input = $request->all();
        if ($request->hasFile('profile_photo_path')) {
            $imageuploaded = request()->file('profile_photo_path');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/images/users');
            $imageuploaded->move($imagepath, $imagename);
            $input['profile_photo_path'] = $imagename;
        }
        $user = Auth::user();

        User::find($id)->update($input);
        Auth::login($user);
        session()->flash('edit', '  تم تعديل القسم بنجاج  ');
        return redirect('companies')->with('success-edit', 'تم تعديل بيانات الشركة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(companies $companies)
    {
        //
    }
}
