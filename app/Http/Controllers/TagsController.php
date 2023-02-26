<?php

namespace App\Http\Controllers;

use App\Models\tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagsController extends Controller
{
    //
    public function index(){

        $tags = tags::all();

        if($tags->count()>0){

            return response()->json([
                'status' => 200,
                'tags' => $tags
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'tags' => 'no data here'
            ], 404);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'tag' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 422,
                'errors' => $validator->errors()
            ], 422);
        } else {
            $tags = tags::create([
                'tag'=>$request->tag,
                'id_Admin'=>auth()->user()->id
            ]);
    
            if($tags){
                return response()->json([
                    'status'=>200,
                    'message'=>"add tag succefully"
                ], 200);
            } else {
                return response()->json([
                    'status'=>500,
                    'message'=>"something wrong"
                ], 500);
            }
        }
    }

    public function edit($id){
        $tags = tags::find($id);

        if($tags){

            
            return response()->json([
                'status'=>200,
                'message'=>$tags
            ], 200);

        }else {
                return response()->json([
                    'status'=>404,
                    'message'=>"tags not found"
                ], 404);
            }

    }




    public function update(Request $request, $id)
    {
    
    
        $validator = Validator::make($request->all(),[
            'tag' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 422,
                'errors' => $validator->errors()
            ], 422);
        } else {
    
            $tags = tags::find($id);

            if($tags){
    
                $tags->update([
                    'tag'=>$request->tag,
                    'id_Admin'=>auth()->user()->id
                ]);
    
                return response()->json([
                    'status'=>200,
                    'message'=>"update successfully"
                ], 200);
            } else {
                return response()->json([
                    'status'=>404,
                    'message'=>"tags not found"
                ], 404);
            }
        }
    }



    public function delete($id)
    {
        $tags = tags::find($id);
        if (!$tags) {
            return response()->json([
                'status' => 404,
                'message' => 'tag not found',
            ], 404);
        }
        
        $tags->delete();
    
        return response()->json([
            'status' => 200,
            'message' => 'tag deleted successfully',
        ], 200);
    }
    
}
