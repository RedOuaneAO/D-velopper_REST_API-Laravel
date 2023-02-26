<?php

namespace App\Http\Controllers;
use App\Models\article;
use App\Models\category;
use App\Http\Controllers;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(){
        $data = article::join('categories', 'articles.Category_id', '=', 'categories.id')
        ->select('articles.title','articles.article','articles.image','categories.type as category')->get();
        return response()->json($data);
    }

    public function addArticle(Request $request){
        $data=new article;
        $data->title=$request->title;
        $imgName=$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('img'), $imgName);
        $data->image=$imgName;
        $data->article=$request->article;
        $data->Category_id=$request->Category_id;
        $data->Author_id=1;
        $data->save();

        return response()->json([
            'status' => true,
            'message' => "Article Created successfully!",
            'article' => $data
        ], 201);
    }
    public function deleteArticle($id){
        $data = article::find($id);
        if($data){
            $data->delete();
            return response()->json([
                'status' => true,
                'message' => "This article deleted successfully",
                'article' => $data
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => "No Such Article Found"
            ], 404);
        }
    }
  
 
}
