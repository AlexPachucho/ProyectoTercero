<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$users=User::all();
        //$users=DB::select("
        //SELECT * FROM users u
            //JOIN roles r ON u.rol_id=r.rol_id
        //");
        $users = User::join('roles as r', 'users.rol_id', '=', 'r.rol_id')
        ->select('users.*', 'r.rol_descripcion')
        ->orderBy('usu_id')
        ->get();

    return view('users.index')->with('users', $users);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles=Roles::all();
        return view('users.create')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        //dd($input);
        User::create($input);
        return Redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($usu_id)
    {   
        //
        $user = User::find($usu_id);
        $roles = Roles::all();
        return view('users.edit')->with(['users' => $user, 'roles' => $roles]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $usu_id)
    {
        //
        $input=$request->all();
        $users=User::find($usu_id);
        $users->update($input);
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($usu_id)
    {
        //
        $users=User::find($usu_id);
        $users->delete();
        return Redirect(route('users.index'));
    }
}
