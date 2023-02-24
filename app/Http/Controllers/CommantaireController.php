<?php

namespace App\Http\Controllers;

use App\Models\commantaire;
use App\Models\User;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\JWTAuth;
class CommantaireController extends Controller
{
    public function index($id){
        $comments=commantaire::where('id_article',$id)->get();
        if(isset($comments)){
            return response()->json([
                'data'=>$comments
            ], 200);
        }else{
            response()->json([
                'status' => 404,
                'data'=>'no data here'
            ], 404);
        }
        
    }
    public function store(Request $request,$articleID){
        $rules = [
            'comment' => 'max:1255',
        ];
        $validateData=$request->validate($rules);
        // if(!$var=JWTAuth::user()){
        //     return response()->json([
        //         'message'=>'error authorisation'
        //     ]);
        // }
        $comments=commantaire::create([
            'comment'=>$validateData['comment'],
            'id_user'=>auth()->user()->id,
            'id_article'=>$articleID
        ]);
        if(isset($validateData['article_id'])){
            $comments->articles()->sync($validateData['article_id']);
        }
        return response()->json(['message' => 'comment created successfully', 'comment' => $comments]);
    }
    public function destroy($idArticle,$idComment){
        $comments=commantaire::where('id_article',$idArticle)->find($idComment);
        $comments->delete();
        return response()->json(['message' => 'comment deleted successfully',
        'deleted_comment' => $comments]);
    }

}
