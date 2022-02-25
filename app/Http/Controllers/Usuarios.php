<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException; 
use App\Models\User;

class Usuarios extends Controller
{
    public function create()    
    {   //MUESTRA FORMULARIO VACIO
        return view('usuarios.form');
    }
    
    public function store(Request $request)
    {   //RECIBE EL POST DEL CREATE        
        $request->validate([
            'nombre'                    => 'required|min:8',
            'email'                     => 'required|email|unique:App\Models\User,email',
            'password'                  => 'required|min:8|confirmed',
            'password_confirmation'     => 'required'
        ]);

        $user = User::create([
            'name'          =>  $request->nombre,
            'email'         =>  $request->email,
            'password'      =>  Crypt::encryptString($request->password)
        ]);
        $user->save();

        return redirect('/')->with(['mensaje' =>  'Se creo usuario correctamente','tipo' =>  'success']);
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);        
        if(isset($user)) //Revisa que el usuario exista --
        {
            $pass = Crypt::decrypt($user->password,0);
            return view('usuarios.form',['user'   =>  $user]);
        }
        else
        {
            throw new ModelNotFoundException();
        }
    }

    public function update($user_id, Request $request)
    {
        $user = User::find($user_id);
        if(isset($user)) //Revisa que el usuario exista
        {
            $request->validate([
                'nombre'                    => 'required|min:8',
                'email'                     => 'required|email|unique:App\Models\User,email',
                'email'                     =>  [
                                                    'required','email', 
                                                    Rule::unique('users')->ignore($user->id),
                                                ],
                'password'                  => 'required|min:8|confirmed',
                'password_confirmation'     => 'required'
            ]);


            $user = User::find($user_id);
            $user->name = $request->nombre;
            $user->email = $request->email;
            $user->password = Crypt::encryptString($request->password);
            $user->save();

            return redirect('/')->with(['mensaje' =>  'Se editó usuario correctamente','tipo' =>  'info']);
        }
        else
        {
            throw new ModelNotFoundException();
        } 
    }

    public function show($user_id)
    {
        $user = User::find($user_id);
        if(isset($user))
        {
            return view('usuarios.show',['user' =>  $user]);
        }
        else
        {
            throw new ModelNotFoundException();
        }
    }

    public function destroy($user_id)
    {
        $user = User::find($user_id);
        if(isset($user))
        {
            $user->delete();
            return redirect('/')->with(['mensaje' =>  'Se eliminó usuario correctamente','tipo' =>  'warning']);
        }
        else
        {
            throw new ModelNotFoundException();
        }
    }
    
}