<?php

namespace App\Http\Controllers;

use App\Models\commantaire;
use Illuminate\Http\Request;
class CommantaireController extends Controller
{
    public function store(Request $request){
        $rules = [
            'comment' => 'max:1255',
            'article_id' => 'array' 
        ];
        $validateData=$request->validate($rules);
        $comments=commantaire::create([
            'comment'=>$validateData['comment'],
            'id_user'=>auth()->user()->id
        ]);
        if(isset($validateData['article_id'])){
            $comments->articles()->sync($validateData['article_id']);
        }
        return response()->json(['message' => 'comment created successfully', 'comment' => $comments]);
    }
}
