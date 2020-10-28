<?php

namespace App\Http\Controllers\User;

use App\Gender;
use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use DataTables;
use Gate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GendersController extends Controller
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
        $genders = Gender::latest()->get();
        
        if ($request->ajax()) {
            $data = Gender::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editGender">Editar</a>';

                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteGender">Eliminar</a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
      
        return view('user.Genders.index',compact('genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gender = Gender::create([
            'name'          => $data['name'],
            'description'   => $data['description'],
            'image'         => $data['image'],
        ]);

        $role = Role::select('id')->where('name','Gender')->first();

        $gender->roles()->attach($role);

        return $gender;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gender::updateOrCreate(['id' => $request->gender_id],
        [
            'name'          => $request->name,
            'description'   => $request->description,
            'image'         => $request->image,

        ]);        

        return response()->json(['success'=>'Gender saved successfully.']);
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
        $gender = Gender::find($id);
        return response()->json($gender);
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
        Gender::find($id)->delete();
        return response()->json(['success'=>'Gender deleted successfully.']);
    }
}
