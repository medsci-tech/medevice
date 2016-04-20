<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
   public function index() {
       return view('article.index', [
           'recommends' => Article::where('type_id', 1)->get(),
           'hots' => Article::where('type_id', 2)->get()
       ]);
   }
}
