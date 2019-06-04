<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->get();
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $user = New User();


    

    
    return view('admin.users.create', compact('user','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
         User::create($this->validateRequest());


         return redirect()->route('users.index')->with('success','User has been created!');
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
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request,User $user)
    {
        $this->validate($request, array(
            'name' => 'required|min:2',
            'email' => "required|email|unique:users,email,$user->id",
            'role_id' => 'required',
            'password' => 'string|confirmed|alpha_dash',
        ));
        
        $user->update($request->all());


        return redirect()->route('users.index')->with('success','User has been updated!');
    }

    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('error','User has been deleted!');
    }
    private function validateRequest(){
        return request()->validate([
            'name' => 'required|min:2',
            'email' => "required|email|unique:users,email",
            'role_id' => 'required',
            'password' => 'string|confirmed|alpha_dash',
            'address' => 'string|required',
            'postcode' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'country' => 'required'
        ]);
        
    }
}