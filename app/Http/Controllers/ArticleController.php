<?php

namespace App\Http\Controllers;
use App\Models\article;
use App\Models\category;
use App\Http\Controllers;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
   

    public function index(){
        $data = article::join('categories', 'articles.id_Category', '=', 'categories.id')
        ->select('articles.title','articles.article','articles.image','categories.type as category')->get();
        return response()->json($data);
    }
  
 
}
