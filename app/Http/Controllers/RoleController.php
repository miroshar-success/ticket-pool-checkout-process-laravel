<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use Throwable;
use Illuminate\Support\Facades\Log;


class RoleController extends Controller
{
    public function index()
    {
        try{
            abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            $roles = Role::with(['permissions:id,name'])->get();
            return view('admin.role.index', compact('roles'));
        }catch(Throwable $th){
            Log::info($th->getMessage());

        }
    }

    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|unique:roles|max:255',
        ]);
        $role = Role::create($request->all());
        if($request->permissions != null){
            $per =  Permission::whereIn('id', $request->permissions)->get();
            $role->syncPermissions($per);
        }
        return redirect()->route('roles.index')->withStatus(__('Role has added successfully.'));
    }

    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        if($role->name == 'admin'){
            return redirect()->route('roles.index')->withStatus(__('You can not edit admin.'));
        }
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::all();
        return view('admin.role.edit', compact('permissions', 'role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'bail|required|unique:roles,name,' . $role->id . ',id',
        ]);
        if($request->permissions != null){
            $per =  Permission::whereIn('id', $request->permissions)->get();
            $role->syncPermissions($per);
        }
         else {
            $role->syncPermissions([]);
        }
        return redirect()->route('roles.index')->withStatus(__('Role has updated successfully.'));
    }

    public function destroy(Role $role)
    {

    }
}
