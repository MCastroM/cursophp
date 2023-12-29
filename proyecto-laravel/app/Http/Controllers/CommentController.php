<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
//use App\Comment;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function save(Request $request){

        // Validación
        $validate = $this->validate($request, [
            'image_id' => 'integer|required',
            'content'  => 'string|required'
        ]);

    

        // Recoger datos
        $user = \Auth::user();
        $image_id = $request->input('image_id');
        $content = $request->input('content');


        // Asigno los valores a mi nuevo objeto a guardar
        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        $comment->save();   
        
        // Redireccion
        return redirect()->route('image.detail', ['id' => $image_id])
                ->with([

                        'message' =>'Has publicado comentario correctamente'
                ]);


    }

    public function delete($id){

        // conseguir datos del usurio identificado
        $user = \Auth::user();

        // conseguir objetos del comentario
        $comment = Comment::find($id);

        // comprobar si soy el dueño del comentario o de la publicación
        if($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id)){
            $comment->delete();
            return redirect()->route('image.detail', ['id' => $comment->image->id])
                ->with([

                        'message' =>'Comentario eliminado correctamente!!'
                ]);
        }else{
            return redirect()->route('image.detail', ['id' => $comment->image->id])
                ->with([

                        'message' =>'Comentario NO se ha eliminado!!'
                ]);

        }

    }


}
