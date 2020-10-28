<?php

namespace App\Http\Controllers\User;

use App\Plataform;
use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use DataTables;
use Gate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlataformsController extends Controller
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
        $plataforms = Plataform::latest()->get();
        
        if ($request->ajax()) {
            $data = Plataform::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPlataform">Editar</a>';

                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePlataform">Eliminar</a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
      
        return view('user.plataforms.index',compact('plataforms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plataform = Plataform::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $data['image'],
        ]);

        $role = Role::select('id')->where('name','plataform')->first();

        $plataform->roles()->attach($role);

        return $plataform;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Plataform::updateOrCreate(['id' => $request->plataform_id],
        [
            'name'          => $request->name,
            'description'   => $request->description,
            'image'         => $request->image,

        ]);        

        return response()->json(['success'=>'Plataform saved successfully.']);
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
        $plataform = Plataform::find($id);
        return response()->json($plataform);
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
        Plataform::find($id)->delete();
     
        return response()->json(['success'=>'Plataform deleted successfully.']);
    
    }
}
