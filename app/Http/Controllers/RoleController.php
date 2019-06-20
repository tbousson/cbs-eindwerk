<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $rolesTrashed = Role::onlyTrashed()->get();
        return view('admin.v2.roles.index', compact('roles','rolesTrashed'));
    }
   
    public function create()
    {
        $role = New Role();
        return view('admin.v2.roles.create', compact('role'));
    }
  
    public function store(Request $request)
    {
        $role = Role::create($this->validateRequest());
        return redirect()->route('roles.index')->with('success','Role '.$role->name.' has been created!');
    }
  
    public function show($id)
    {
        //
    }
    public function edit(Role $role)
    {
       
        return view('admin.v2.roles.edit', compact('role'));
    }
 
    public function update(Request $request, $id)
    {
        $role = Role::withTrashed()->findOrFail($id);
        
        
        if($role->deleted_at)
        {
            $role->restore();
            return redirect()->route('roles.index')->with('success','Role '.$role->name.' has been restored!');
        }
        $this->validate($request, array(
            'name' => "required|min:2|unique:roles,name,$role->id",
        ));
        $role->update($request->all());
        return redirect()->route('roles.index')->with('success','Role '.$role->name.' has been updated!');
    }
 
    public function destroy(Role $role)
    {
        $deleting=$role->name;
        $role->delete();
        return redirect()->route('roles.index')->with('error','Role '.$deleting.' has been deleted!');
    }
        private function validateRequest(){
           
        return request()->validate([
            'name' => 'required|min:2|unique:roles,name',
        ]);
        
    }
}
