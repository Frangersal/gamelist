<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Gate;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function _contruct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index')->with('users', $users)->with('roles', $roles);
    }

    //Crear un metodo para redirigir a vista listall
    public function listall()
    {
        $users = User::all();
        return view('admin.users.listall')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::create([
            'nick' => $data['nick'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $role = Role::select('id')->where('name','user')->first();

        $user->roles()->attach($role);

        return $user;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nick'      => 'required|max:255',
            'name'      => 'required|max:255',
            'email'     => 'required',
            'password'  => 'required',
            // 'picture'   => 'required',
        ]);
  
        $user = User::updateOrCreate(['id' => $request->id], [
            'title' => $request->title,
            'description' => $request->description
        ]);
  
        return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $post], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('admin-users')){
            return redirect(route('admin.users.index'));
        } 
         
        # dd($user); // Para visualizer la bd
        $roles = Role::all();
        return view('admin.users.edit')->with([
            'user'=>$user,
            'roles'=>$roles,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        #dd($request);
        $user->roles()->sync($request->roles);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save(); 
        return redirect()->route('admin.users.index');  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(User $user)
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return response()->json(['success'=>'User eliminado con exito']);

        // if(Gate::denies('admin-users')){
        //     return redirect(route('admin.users.index'));
        // } 
         
        // $user->roles()->detach();
        // $user->delete();
        // return redirect()->route('admin.users.index');

    }
}
