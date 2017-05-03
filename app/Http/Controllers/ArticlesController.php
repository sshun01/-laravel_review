<?php

namespace App\Http\Controllers;

use Auth;
use App\Article;
use App\Http\Controllers\Controller; 
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticlesController extends Controller {

    public function _construct() {
        
        $this->middleware('auth', ['only' => 'create']);    
    }

    public function index() {
        
        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
    }
    
    public function show($id) {
        
        $article = Article::findOrFail($id);
    
        return view('articles.show', compact('article'));    
    }

    public function create() {
        
        return view('articles.create');
    }

    public function store(ArticleRequest $request) {

        Auth::user()->articles()->create($request->all());
        
        flash('You are now logged in');

        return redirect('articles')->with('flash_message');
   }

   public function edit($id) {
       
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));   
    }
    
    public function update($id, ArticleRequest $request) {
        
        $article = Article::findOrFail($id);

        $article->update($request->all());

        return redirect('articles');
    }
}
