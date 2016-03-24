<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
   public function index() {
       return view('article.index');
   }
}
