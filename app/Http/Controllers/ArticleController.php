<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleModels;
use Illuminate\Support\Str;
use Illuminate\Foundation\Console\Presets\React;

class ArticleController extends Controller
{
    public function index() {
        $articles = ArticleModels::get_all();
        
        return view('article.index',compact('articles'));
    }

    public function create() {
        return view('article.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        ArticleModels::save([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
            'tag' => $request->tag,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        
        return redirect('/article')->with('success', 'Article Successfully Added!');
    }

    public function edit($id) {
        $articles = ArticleModels::find_by_id($id);

        return view('article.edit', compact('articles'));
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);
            
        // dd($data);
        ArticleModels::update($id, [
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
            'tag' => $request->tag,
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        return redirect('/article')->with('success', 'Article Successfully Updated!');
    }

    public function destroy($id) {
        ArticleModels::delete($id);
        return redirect('/article')->with('success', 'Success! One Article Deleted');
    }

    public function show($id) {
        $articles = ArticleModels::find_by_id($id);
        return view('article.show', compact('articles'));
    }
}