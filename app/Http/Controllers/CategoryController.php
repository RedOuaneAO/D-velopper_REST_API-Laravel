<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){

        $category = category::all();

        if($category->count()>0){

            return response()->json([
                'status' => 200,
                'category' => $category
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'category' => 'no data here'
            ], 404);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'type' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 422,
                'errors' => $validator->errors()
            ], 422);
        } else {
            $category = Category::create([
                'type'=>$request->type,
                'id_Admin'=>auth()->user()->id
            ]);
    
            if($category){
                return response()->json([
                    'status'=>200,
                    'message'=>"add student"
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
        $category = category::find($id);

        if($category){

            
            return response()->json([
                'status'=>200,
                'message'=>$category
            ], 200);

        }else {
                return response()->json([
                    'status'=>404,
                    'message'=>"category not found"
                ], 404);
            }

    }



    public function update(Request $request, $id)
{


    $validator = Validator::make($request->all(),[
        'type' => 'required'
    ]);
    if($validator->fails()){
        return response()->json([
            'status'=> 422,
            'errors' => $validator->errors()
        ], 422);
    } else {

        $category = Category::find($id);


        if($category){

            $category->update([
                'type'=>$request->type,
                'id_Admin'=>auth()->user()->id
            ]);



            return response()->json([
                'status'=>200,
                'message'=>"update successfully"
            ], 200);
        } else {
            return response()->json([
                'status'=>404,
                'message'=>"category not found"
            ], 404);
        }
    }


}

        public function delete($id)
{
    $category = Category::find($id);
    if (!$category) {
        return response()->json([
            'status' => 404,
            'message' => 'Category not found',
        ], 404);
    }
    
    $category->delete();

    return response()->json([
        'status' => 200,
        'message' => 'Category deleted successfully',
    ], 200);
}
    

}
