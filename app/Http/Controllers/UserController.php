<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function __construct(){

    	$this->middleware('auth');
    }

    public function index(){

    	$users = User::all();

    	return view('users.index',compact('users'));
    }

    public function create(){

    	return view('users.create');
    }

    public function store(Request $request){

    	$this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'role'=>'required',
            'password' => 'required'
        ]);

        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = bcrypt($request->input('password'));
        $user->save();

         return redirect('users')->with('success','USUARIO CREADO CON ÉXITO');
    }

    public function edit($id){

    	$user = User::find($id);

    	return view('users.edit',compact('user'));
    }

    public function update(Request $request, $id){
        
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'role'=>'required'
        ]);

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->save();
        
        return redirect('users')->with('success','USUARIO ACTUALIZADO CON ÉXITO');

    }

    public function destroy($id){

    	$user = User::find($id);

    	$user->delete();

    	 return redirect('users')->with('success','USUARIO ELIMINADO CON ÉXITO');
    }


}
