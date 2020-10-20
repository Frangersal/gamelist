<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DataTables;
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
    
    public function index(Request $request)
    {
        
        $users = User::latest()->get();
        
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser">Editar</a>';

                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Eliminar</a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
      
        return view('admin.users.index',compact('users'));
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
            'picture' => $data['picture'],
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
        User::updateOrCreate(['id' => $request->user_id],
        [
            'nick'      => $request->nick,
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->email),
            'picture'   => $request->picture,

        ]);        

        return response()->json(['success'=>'User saved successfully.']);
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
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);

        // if(Gate::denies('admin-users')){
        //     return redirect(route('admin.users.index'));
        // } 
         
        // # dd($user); // Para visualizer la bd
        // $roles = Role::all();
        // return view('admin.users.edit')->with([
        //     'user'=>$user,
        //     'roles'=>$roles,
        // ]);

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
        // #dd($request);
        // $user->roles()->sync($request->roles);
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->save(); 
        // return redirect()->route('admin.users.index');  

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
        User::find($id)->delete();
     
        return response()->json(['success'=>'User deleted successfully.']);

        // if(Gate::denies('admin-users')){
        //     return redirect(route('admin.users.index'));
        // } 
         
        // $user->roles()->detach();
        // $user->delete();
        // return redirect()->route('admin.users.index');

    }
}