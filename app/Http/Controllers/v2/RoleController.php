<?php

namespace App\Http\Controllers\v2;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.v2.roles.index', compact('roles'));
    }
   
    public function create()
    {
        $role = New Role();
        return view('admin.v2.roles.create', compact('role'));
    }
  
    public function store(Request $request)
    {
        Role::create($this->validateRequest());
        return redirect()->route('roles.index')->with('success','Role has been created!');
    }
  
    public function show($id)
    {
        //
    }
    public function edit(Role $role)
    {
       
        return view('admin.v2.roles.edit', compact('role'));
    }
 
    public function update(Request $request, Role $role)
    {
        $this->validate($request, array(
            'name' => "required|min:2|unique:roles,name,$role->id",
        ));
        $role->update($request->all());
        return redirect()->route('roles.index')->with('success','Role has been updated!');
    }
 
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('error','Role has been deleted!');
    }
        private function validateRequest(){
           
        return request()->validate([
            'name' => 'required|min:2|unique:roles,name',
        ]);
        
    }
}
