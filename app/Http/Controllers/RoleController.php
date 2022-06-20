<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /*** Display a listing of the resource.** @return Response */

    function __construct()
    {

        $this->middleware('permission:لوحة تحكم المسؤول', ['only' => ['index']]);
        $this->middleware('permission:لوحة تحكم المسؤول', ['only' => ['create', 'store']]);
        $this->middleware('permission:لوحة تحكم المسؤول', ['only' => ['edit', 'update']]);
        $this->middleware('permission:لوحة تحكم المسؤول', ['only' => ['destroy']]);

        $this->middleware('permission:الاقسام', ['only' => ['index']]);
        $this->middleware('permission:الاقسام', ['only' => ['create', 'store']]);
        $this->middleware('permission:الاقسام', ['only' => ['edit', 'update']]);
        $this->middleware('permission:الاقسام', ['only' => ['destroy']]);

        $this->middleware('permission:الشركات', ['only' => ['index']]);
        $this->middleware('permission:الشركات', ['only' => ['create', 'store']]);
        $this->middleware('permission:الشركات', ['only' => ['edit', 'update']]);
        $this->middleware('permission:الشركات', ['only' => ['destroy']]);

        $this->middleware('permission:الملاحظات', ['only' => ['index']]);
        $this->middleware('permission:الملاحظات', ['only' => ['create', 'store']]);
        $this->middleware('permission:الملاحظات', ['only' => ['edit', 'update']]);
        $this->middleware('permission:الملاحظات', ['only' => ['destroy']]);

        $this->middleware('permission:ادارة المستخدمين', ['only' => ['index']]);
        $this->middleware('permission:ادارة المستخدمين', ['only' => ['create', 'store']]);
        $this->middleware('permission:ادارة المستخدمين', ['only' => ['edit', 'update']]);
        $this->middleware('permission:ادارة المستخدمين', ['only' => ['destroy']]);

    }

    /*** Display a listing of the resource.** @return Response */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('roles.index', compact('roles'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /*** Show the form for creating a new resource.** @return Response */
    public function create()
    {
        $permission = Permission::get();
        return view('roles.create', compact('permission'));
    }

    /*** Store a newly created resource in storage.** @param Request $request * @return \Illuminate\Http\Response */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:roles,name', 'permission' => 'required',]);
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')->with('success-create', 'تم اضافة الصلاحية بنجاح');
    }

    /*** Display the specified resource.** @param int $id * @return \Illuminate\Http\Response */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")->where("role_has_permissions.role_id", $id)->get();
        return view('roles.show', compact('role', 'rolePermissions'));
    }

    /*** Show the form for editing the specified resource.** @param int $id * @return \Illuminate\Http\Response */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')->all();
        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    /*** Update the specified resource in storage.** @param Request $request * @param  int  $id* @return \Illuminate\Http\Response */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required', 'permission' => 'required',]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')->with('success-edit', 'تم تعديل بيانات الصلاحية بنجاح');
    }

    /*** Remove the specified resource from storage.** @param int $id * @return \Illuminate\Http\Response */
    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')->with('success-delete', 'تم حذف الصلاحية بنجاح');
    }
}
