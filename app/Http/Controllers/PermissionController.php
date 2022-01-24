<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdatePermission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Log\LogSistema;

class PermissionController extends Controller
{


     public function __construct()
    {
        $this->middleware('permission:VerPermisos')->only('index'); 
        $this->middleware('permission:EditarPermisos')->only('create');
        $this->middleware('permission:VerPermisos')->only('show'); 

    } 


    public function index()
    {
        $permissions = Permission::get();

        $log = new LogSistema();

        $log->user_id         = auth()->user()->id;
        $log->tx_descripcion  = 'El usuario: '.auth()->user()->display_name.' Ha ingresado a ver los permisos del sistema a las: '
        . date('H:m:i').' del día: '.date('d/m/Y');
        $log->save();

        return view('admin.permission.index', ['permissions' => $permissions]);
    }


    public function show($id)
    {  
        
        //$roles = Role::get();
        $role = Role::findByName($id);
        //dd($role);
        $name = $role->name;

        $log = new LogSistema();

        $log->user_id         = auth()->user()->id;
        $log->tx_descripcion  = 'El usuario: '.auth()->user()->display_name.' Ha ingresado a ver los permisos del Role: '.$role->name.' a las: '. date('H:m:i').' del día: '.date('d/m/Y');
        $log->save();

        return view('admin.permission.asignar',compact('name','role'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Permission::create($request->only('name'));

        return redirect()->route('admin.permission.index');
    }


    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->only('name'));

        return redirect()->route('admin.permission.index');
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        

        $permission->delete();

        return redirect()->route('admin.permission.index');
    }

}
