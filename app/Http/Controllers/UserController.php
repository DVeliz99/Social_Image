<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\storage; //Para el manejo de las imagenes
use Illuminate\Support\Facades\File; //Manejar archivos 
use Illuminate\Http\Response;


class UserController extends Controller
{
    public function config()
    {
        return view('user.config'); //retorno a la vista config.blade.php
    }

    public function update(Request $request)
    {
        //obtener el usuario autenticado

        $user = Auth::user(); //se obtiene todos los datos del usuario
        $id = $user->id; //se obtiene el id del usuario
       
        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255','unique:users,name,'.$id],
            'surname' => ['required', 'string', 'max:255','unique:users,surname,'.$id],
            'nickname' => ['required', 'string', 'max:255','unique:users,nickname,'.$id], //con la excepcion de que el nickname coincida con el actual
            'email' => ['required', 'max:255', 'unique:users,email,'.$id],
        ]);

        



        //Recoger datos del formulario
        $name=$request->input('name');
        $surname=$request->input('surname');
        $nickname=$request->input('nickname');
        $email=$request->input('email');

        //Asignar nuevos valores al usuario

        $user->name=$name;
        $user->surname=$surname;
        $user->nickname=$nickname;
        $user->email=$email;

        /*Subir la image */

        //Obtener imagen
        $image_path=$request->file('image_path');

        if($image_path){
        $image_path_name=time().$image_path->getClientOriginalName();
        //Time()  =>permite obtener la hora actual
        //getClientOriginalName() => permite obtener el nombre original del archivo 

        Storage::disk('users')->put($image_path_name,File::get($image_path)); //Añadimos la imagen al disco

        $user->image=$image_path_name; //Se añade el nombre de la imagen al campo en del usuario en la base de datos 
        }else{
            $user->image="image";
        }



        //Ejecutar consulta y cambios en la base de datos por medio de Eloquent
        $user->update();

        return redirect()->route('config')->with(['message'=>'User has been successfully updated!']); //Sesion momentanea

    }

    public function getImage($filename){
        $file=Storage::disk('users')->get($filename); //Accedemos al disco virtual en el archivo filesystem.php
        return new Response($file,200); //Response devuelve respuesta en http
        //Devuelve la instancia con la imagen y el codigo ok =200

    }
}
