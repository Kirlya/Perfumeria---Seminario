<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('permission:crear-rol|editar-rol|deshabilitar-rol', ['only' => ['index','show']]);
         $this->middleware('permission:crear-rol', ['only' => ['create','store']]);
         $this->middleware('permission:editar-rol', ['only' => ['edit','update']]);
         $this->middleware('permission:deshabilitar-rol', ['only' => ['destroy']]);
     }

    public function index()
    {
        $roles = DB::table('roles');
        return view('roles.index', [
            'roles' => Role::with('permissions')->orderBy('id', 'DESC')->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create', [
            'permissions' => Permission::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);

        $permissions = Permission::whereIn('id', $request->permissions)->get(['name'])->toArray();
        
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')
                ->withSuccess('Se ha añadido un nuevo rol.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if($role->name=='Administrador'){
            abort(403, 'El rol administrador no puede ser editado');
        }

        $rolePermissions = DB::table("role_has_permissions")->where("role_id",$role->id)
            ->pluck('permission_id')
            ->all();

        return view('roles.edit', [
            'role' => $role,
            'permissions' => Permission::get(),
            'rolePermissions' => $rolePermissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->only('name');

        $role->update($input);

        $permissions = Permission::whereIn('id', $request->permissions)->get(['name'])->toArray();

        $role->syncPermissions($permissions);    
        
        return redirect()->back()
                ->withSuccess('Rol actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        if($role->name=='Administrador'){
            abort(403, 'El rol administrador no puede ser borrado');
        }
        if(auth()->user()->hasRole($role->name)){
            abort(403, 'No puede eliminar su mismo rol');
        }
        $role->delete();
        return redirect()->route('roles.index')
                ->withSuccess('Rol borrado.');
    }
    
}
