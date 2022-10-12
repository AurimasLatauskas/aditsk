<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\CommentRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{

    public function index(): View
    {
        $articles = Article::get();

        return view('article.index', compact('articles'));
    }

    public function create(): View
    {
        $categories = Category::get();

        return view('article.create', compact('categories'));
    }

    public function store(ArticleRequest $request): RedirectResponse
    {
        $postData = $request->validated();

        $article = Article::create($postData);
        $article->categories()->attach($postData['categories']);

        return redirect()->route('articles.create')->with('message', 'Sekmingai sukurta!');
    }

    public function show(Article $article): view
    {
        return view('article.show', compact('article'));
    }

    public function edit(Article $article): View
    {
        $categories = Category::get();
        $articleCategories = $article->categories()->pluck('category_id')->toArray();

        return view('article.edit', compact('categories', 'article', 'articleCategories'));
    }

    public function update(ArticleRequest $request, Article $article): RedirectResponse
    {
        $postData = $request->validated();

        $article->update($postData);
        $article->categories()->sync($postData['categories']);

        return redirect()->route('articles.edit', $article)->with('message', 'Sekmingai pakeista!');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('articles.manage');
    }

    public function manage(): View
    {
        $articles = Article::get();

        return view('article.manage', compact('articles'));
    }

    public function comment(Article $article, CommentRequest $request): RedirectResponse
    {
        $postData = $request->validated();

        $article->comments()->create($postData);

        return redirect()->route('articles.show', $article);
    }
}
