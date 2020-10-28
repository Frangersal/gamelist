<?php

namespace App\Http\Controllers\User;

use App\Game;
use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use DataTables;
use Gate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GamesController extends Controller
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
        $games = Game::latest()->get();
        
        if ($request->ajax()) {
            $data = Game::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editGame">Editar</a>';

                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteGame">Eliminar</a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
      
        return view('user.Games.index',compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $game = Game::create([
            'name'          => $data['name'],
            'serie'         => $data['serie'],
            'gender'        => $data['gender'],
            
            'plataform'     => $data['plataform'],
            'developer'     => $data['developer'],
            'publisher'     => $data['publisher'],
            
            'director'      => $data['director'],
            'productor'     => $data['productor'],
            'release_date'  => $data['release_date'],

            'admin_verificatione'  => $data['admin_verification'],
        ]);

        $role = Role::select('id')->where('name','Game')->first();

        $game->roles()->attach($role);

        return $game;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Game::updateOrCreate(['id' => $request->game_id],
        [
            'name'          => $data['name'],
            'serie'         => $data['serie'],
            'gender'        => $data['gender'],
            
            'plataform'     => $data['plataform'],
            'developer'     => $data['developer'],
            'publisher'     => $data['publisher'],
            
            'director'      => $data['director'],
            'productor'     => $data['productor'],
            'release_date'  => $data['release_date'],
            
            'admin_verification'  => $data['admin_verification'],

        ]);        

        return response()->json(['success'=>'Game saved successfully.']);
    
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
        $game = Game::find($id);
        return response()->json($game);
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
        Game::find($id)->delete();
        return response()->json(['success'=>'Game deleted successfully.']);
    }
}
