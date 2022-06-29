<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Places;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Feedback = Feedback::orderBy('id', 'desc')->get();
        return view('admin.feedback.index', compact('Feedback'));

    }

    public function getDetails(Request $request, $id)
    {
        $Feedback = Feedback::where('id', $id)->first();
        return view('admin.feedback.show', compact('Feedback'));

    }

    public function Home_Page()
    {
        $address = Places::get();
//        dd($data);
        return view('index', compact('address'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'feedback_sender_name'=>'required|string|max:40',
            'feedback_sender_email'=>'required|email|max:255',
            'description'=>'required|string|max:255',
        ]);
        $input = $request->all();

        Feedback::create($input);
        Alert::success('تم ارسالة الملاحظة بنجاح', 'Success Message');
//        return view('index')->with('message', 'IT WORKS!');
        return back();
//        return redirect()->back()->with('message', 'IT WORKS!');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback, $id)
    {
        Feedback::find($id)->delete();
        session()->flash('delete', 'تم حذف الملاحظة بنجاح');
        return redirect('admin/feedback')->with('success-delete', 'تم حذف الملاحظة بنجاح');
    }
}
