<?php

namespace App\Http\Controllers;

use App\Models\sections;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }
    public function indexUser()
    {
        $user = Auth::user();
        $Services = Services::where('users_id', $user->id)->orderBy('id', 'ASC')->get();
        return view('vendor.services.show',compact('Services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.services.create');

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
            'description' => ['required', 'string', 'max:255'],
            'service_name' => ['required', 'string', 'max:20'],
            ]);

        $input = $request->all();
        $input['users_id'] = Auth::user()->id;
        Services::create($input);

        return redirect('user/services')->with('success-create', 'تم اضافة الميزة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $services,$id)
    {
        $user = Auth::user();
        $Services = Services::find($id);
        return view('vendor.services.edit', compact('Services'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $services,$id)
    {
        $request->validate([
            'description' => ['required', 'string', 'max:255'],
            'service_name' => ['required', 'string', 'max:20'],
        ]);
        $input = $request->all();
        $input['users_id'] = Auth::user()->id;
        Services::find($id)->update($input);

        return redirect('user/services')->with('success-edit', 'تم تعديل بيانات الميزة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Services $services)
    {
        $user = Auth::user();
        $id = $request->id;
        Services::find($id)->delete();

        return redirect('user/services')->with('success-delete', 'تم حذف الميزة بنجاح');
    }
}
