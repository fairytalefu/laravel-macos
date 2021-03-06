<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;

class ArticlesController extends Controller
{
    //
    public function index()
    {
        $articles=Article::latest()->published()->get();
        return view('articles.index',compact('articles',$articles));
        //return 'articles pages';
    }


    public function show($id)
    {
       /*$article = Article::find($id);
        if(is_null($article)){
            abort(404);
        }*/
        $article = Article::findOrFail($id);
        //dd($article);
       return view('articles.show',compact('article',$article));
    }
    public function create()
    {
        return view('articles.create');
    }
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit',compact('article',$article));
    }
    public function update(Requests\CreateArticleRequest $request,$id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('/articles');
    }
    public function store(Requests\CreateArticleRequest $request)
    {
        //dd($request->all());
        //dd($request->get('title'));
        //$input['published_at']=Carbon::now();
        Article::create(array_merge(['user_id'=>\Auth::user()->id],$request->all()));
        return redirect('/articles');
    }
}
