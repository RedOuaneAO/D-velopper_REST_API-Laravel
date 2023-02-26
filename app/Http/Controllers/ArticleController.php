<?php

namespace App\Http\Controllers;
use App\Models\article;
use App\Models\category;
use App\Http\Controllers;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(){
        $data = article::join('categories', 'articles.Category_id', '=', 'categories.id')
        ->select('articles.id','articles.title','articles.article','articles.image','categories.type as category')->get();
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
        $data->Author_id=auth()->user()->id;
        $data->save();

        return response()->json([
            'status' => true,
            'message' => "Article Created successfully!",
            'article' => $data
        ], 201);
    }
   
    public function showArticle($id){
        $data = article::join('categories', 'articles.Category_id', '=', 'categories.id')
        ->select('articles.title','articles.article','articles.image','categories.type as category')->find($id);
        if($data){
            return response()->json($data);
        }else{
           return response()->json([
                'status' => 404,
                'message' => "No Such Article Found"
            ], 404);
        }
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
    
 
    public function updateArticle(Request $request,$id){
        $data =article::find($id);
        // return $data;
        if(!$data){
            return response()->json([
                'status' => 404,
                'message' => "No Such Article Found"
            ], 404);
        }
        if (!empty(request()->hasFile('image'))) {
            $imgName = request()->file('image')->getClientOriginalName();
            request()->image->move(public_path('img'), $imgName);
            $data->image = $imgName;
            $data->update();
        }
        $data->update(request()->except('image'));
        // $data->where('id',$id)->update([
        //     'title'=> $request->input('title'),
        //     'article'=> $request->input('article')
        // ]);
        return response()->json([
            'status' => true,
            'message' => "The article updated successfully",
            'article' => $data
        ], 200);
    }
}
