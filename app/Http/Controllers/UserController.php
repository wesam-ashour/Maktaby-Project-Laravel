<?php namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /*** Display a listing of the resource.** @return Response */
    public function index(Request $request)
    {
        $user = Auth::user();
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('users.show', compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /*** Show the form for creating a new resource.** @return Response */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    /*** Store a newly created resource in storage.** @param Request $request * @return \Illuminate\Http\Response */
    public function store(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:40'],
            'company_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'website' => ['required', 'url', 'max:255'],
            'city' => ['required','string', 'max:15'],
            'password' => 'required|same:confirm-password',
            'Status' => ['required','string', 'max:15'],
            'roles' => ['required', 'max:100'],
            ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['profile_photo_path'] = '1650494858.jpg';
        $user = User::create($input);

        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('success-create', 'تم إنشاء المستخدم بنجاح');
    }

    /*** Show the form for editing the specified resource.** @param int $id * @return \Illuminate\Http\Response */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /*** Update the specified resource in storage.** @param Request $request * @param  int  $id* @return \Illuminate\Http\Response */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:40',
            'email' => 'required|email|unique:users,email,' . $id,
            'Status' => ['required','string', 'max:15'],
            'roles' => ['required', 'max:100'],
        ]);
        $input = $request->all();
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('success-edit', 'تم تعديل بيانات المستخدم بنجاح');
    }

    /*** Remove the specified resource from storage.** @param int $id * @return \Illuminate\Http\Response */
    public function destroy(Request $request,$id)
    {
        $user = Auth::user();
        $id = $request->id;
        User::find($id)->delete();
        return redirect()->route('users.index',compact('user'))->with('success-delete', 'تم حذف المستخدم بنجاح');
    }

}
