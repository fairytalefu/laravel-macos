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
        $articles=Article::latest()->get();
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
    public function store(Request $request)
    {
        //dd($request->all());
        //dd($request->get('title'));
        $input=$request->all();
        $input['published_at']=Carbon::now();
        Article::create($input);
        return redirect('/articles');
    }
}
