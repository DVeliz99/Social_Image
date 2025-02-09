<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Http\Response; //Para mostrar la imagen
use App\Models\Image; //Nos permite para setear los valores de la imagen y poder guardarla en la base de datos
use Illuminate\Support\Facades\Storage; //para guardar ene l disco virtual
use Illuminate\Support\Facades\File; //Poder tomar el archivo y guardarlo
use Illuminate\Support\Facades\Auth; // Obtener los datos del usuario autenticado 


class ImageController extends Controller
{
    public function create()
    {
        return view('image.create');
    }

    public function save(Request $request)
    {


        //Validacion
        $validate = $this->validate($request, [
            'description' => ['required', 'string'],
            'image_path' => ['required', 'image',]
        ]);

         //Recoger Datos

         $image_path=$request->file('image_path');
         $description=$request->input('description');

         //Asignar valores a nuevo objeto

         $user=Auth::user();
         $image=new Image(); //Objeto imagen
         $image->user_id=$user->id;  //Asignamos al user_id del objeto imagen el id del usuario identificado
         $image->description=$description; //la description que obtuvimos en el formulario

         //Subir fichero

         if($image_path){
            $image_path_name=time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name,File::get($image_path));
            $image->image_path=$image_path_name;//Setear el nombre de la imagen 


            $image->save(); //Guarda los registros en la base de datos 


            return redirect()->route('home')->with(['message'=>'Post has been successfully submitted!']);
         }



    }
}
