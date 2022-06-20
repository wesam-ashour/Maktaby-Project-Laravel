<?php

namespace App\Http\Controllers;

use App\Models\sections;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if(view()->exists($id)){
            return view($id);
        }
        else
        {
            return view('404');
        }

     //   return view($id);
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

    public function viewWorkspaces()
    {
        $sections = sections::get();
        return view('workspaces',compact('sections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $User = Auth::user();
        return view('profile',compact('User'));
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
        $user = Auth::user();
        $request->validate([
            'name' => ['required', 'string', 'max:40'],
            'company_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'email' => ['required','string','email','max:255',
                Rule::unique('users')->ignore($user->id),
            ],
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

        User::find($id)->update($input);
        Auth::login($user);

        return redirect('change/profile/information')->with('success-edit', 'تم تعديل بيانات الملف الشخصي بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getDetails($id)
    {
        $UserData = User::where('id',$id)->first();
        return view('information',compact('UserData'));
    }
}
