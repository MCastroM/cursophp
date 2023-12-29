<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{

    //restringe las acciones a usuarios identificados
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = \Auth::user();
        $likes = Like::where('user_id', $user->id)->orderBy('id','desc')
                            ->paginate(5);

        return view('like.index',[
            'likes' =>$likes

            ]);
    }

    public function like($image_id){
        //Recoger datos del usuario y la imagen
        $user = \Auth::user();

        // condicion para no repetir los likes de un mismo usuario 
        $isset_like = Like::where('user_id', $user->id)
                        ->where('image_id', $image_id)
                        ->count();


        if($isset_like == 0){
            $like = new Like();
            $like->user_id = $user->id;
            $like->image_id = (int) $image_id;

            //  Guardo el Like de la BD
            $like->save();
            return response()->json([
                'like' => $like

            ]);
        }else {
            return response()->json([
                'message' => 'El like ya existe'
            ]);
        }

    }

    public function dislike($image_id){

        //Recoger datos del usuario y la imagen
        $user = \Auth::user();

        // condicion para no repetir los likes de un mismo usuario 
        $like = Like::where('user_id', $user->id)
                        ->where('image_id', $image_id)
                        ->first();


        if($like){
         
            //Elimino el Like de la BD
            $like->delete();

            return response()->json([
                'like' => $like,
                'message' => 'Has dado Dislike correctamente'

            ]);
        }else {
            return response()->json([
                'message' => 'El like no existe'
            ]);
        }
    }




}
