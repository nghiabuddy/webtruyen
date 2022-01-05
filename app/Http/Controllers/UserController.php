<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$role = Role::create(['name' => 'writer']);
        // $permission = Permission::create(['name' => 'create story']);
        //$role = Role::find(3);
        //$permission = Permission::find(2);

        //$role->givePermissionTo($permission); //vai trò có quyền
        // $permission->syncRoles($role); //quyền có vai trò (ghi đè)

        // $role->syncPermissions($permissions); (vai trò có nhiều quyền)
        // $permission->syncRoles($roles); (quyền có nhiều vai trò)

        // auth()->user()->assignRole('admin'); phân quyền người login hiện tại có vai trò admin

        //auth()->user()->givePermissionTo(['edit story', 'edit chapter', 'create story', 'create chapter']); người login hiện tại có các quyền
        //syncPermissions : cập nhật quyền

        //gán vai trò cho người dùng
        /* $user=User::find($id);
        $user->assignRole('admin'); */

        /*  $role->revokePermissionTo($permission);
        $permission->removeRole($role); */ //xóa quyền
        
        //$user = User::with('roles', 'permissions')->get();
        return view('admincp.user.vai-tro');
    }
    public function assignRole($id)
    {
    }
    public function insert_role(Request $request, $id)
    {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admincp.user.create-role');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated_data = $request->validate(
            [
                'name' => 'required|unique:roles',
            ],
            [
                'name.required' => 'Vai trò không được để trống'
            ]
        );
        //  $this->theloai->create($validated_data);
        $role = Role::create($validated_data);
        // return redirect()->route(('danhmuc.index'));
        return redirect()->back()->with('status', 'Thêm vai trò thành công');
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
    public function destroy($id)
    {
        //
    }
}