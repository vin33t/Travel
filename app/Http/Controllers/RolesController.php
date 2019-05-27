<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;
use App\User;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Role.index')->with('roles',Role::all())
                                ->with('role',null)
                                ->with('permissions',Permission::all());
    }

    public function CreateRole(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        Session::flash('success','New Role created');
        return redirect()->back();
    }

    public function findRole($id){
        $role = Role::find($id);
        $permissions = $role->Permissions;
        return view('Role.index')->with('roles',Role::all())
                                ->with('permissions',Permission::all())
                                ->with('role',$role);
    }

    public function assignPermissions(Request $request,$id,$permission_id){
        $role = Role::find($id);
        // $permissions = $role->Permissions;
        // foreach ($permissions as $per) {
        //     $role->revokePermissionTo($per);
        // }
        // dd($request->permissions);
        // foreach($request->permissions as $permission){
        //     $role->givePermissionTo($permission);
        // }
        // return view('Role.index')->with('roles',Role::all())
        //                         ->with('permissions',Permission::all())
        //                         ->with('role',$role);

        $role->givePermissionTo($permission_id);
        return redirect()->back();
    }

    public function revokePermissions(Request $request,$id,$permission_id){
        $role = Role::find($id);
        $role->revokePermissionTo($permission_id);
        return redirect()->back();
    }

    public function userRole($id){
        return view('userRoles')->with('user',User::find($id))
                                ->with('roles',Role::all())
                                ->with('permissions',Permission::all());
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyRole($id)
    {
        $role = Role::find($id);
        $role->delete();
        Session::flash('warning','Role deleted!!');
        return view('Role.index')->with('roles',Role::all())
                                ->with('role',null)
                                ->with('permissions',Permission::all());
    }
}