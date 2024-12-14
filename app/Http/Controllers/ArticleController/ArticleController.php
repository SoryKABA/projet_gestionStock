<?php

namespace App\Http\Controllers\ArticleController;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticlesRequest\ArticlesRequest;
use App\Models\Articles;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Articles::all();
        $categories = Category::select('title', 'id')->get();
        return view('articles.articles', compact('articles', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $article = new Articles();
        $categories = Category::select('title', 'id')->get();
        return view('articles.createArticle', compact('article', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticlesRequest $request)
    {
        $article = new Articles();


        $article->create($this->extractData($article, $request));
        $article->category()->associate($request->validated('category_id'));
        return redirect()->route('admin.articles.index')->with('success', "L'article a bien été ajouté");
    }

    private function extractData(Articles $article, ArticlesRequest $request): array
    {

        $data = $request->validated();

        $data['code_barre'] = $article->code_barre ?? mt_rand(1000000000, 9999999999);
        /** @var UploadedFile $image */
        $image = $request->validated('image');
        if ($article->image && $image !== null) {
            Storage::disk('public')->delete($article->image);
        }
        if ($article->imageArticle() && $image == null) {
            $data['image'] = $article->imageArticle();
            // dd($data);
        } else {

            $data['image'] = $image->store('articles', 'public');
        }

        return $data;
    }

    // private function articleCodeExists($code): bool
    // {
    //     return (new Articles())->whereArticleCodeBarre($code);
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articles $article)
    {

        $categories = Category::select('title', 'id')->get();
        return view('articles.createArticle', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticlesRequest $request, Articles $article)
    {

        $article->update($this->extractData($article, $request));
        $article->category()->associate($request->validated('category_id'));
        return redirect()->route('admin.articles.index')->with('success', "L'article a bien été modifié");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articles $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', "L'article a bien été supprimé");
    }
}