<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class GenerateCodeBarreController extends Controller
{

    public function codeBarreGenerate(Request $request)
    {
        //dd($request);
        $articles = Articles::orderBy('id', 'desc')->limit((int)$request->input('limit'))->get();
        return FacadePdf::loadView('admin.code_barre', compact('articles'))->download('code_barre.pdf');
    }

    public function codeBarreArticle(Articles $articles)
    {
        return FacadePdf::loadView('admin.code_barre', compact('articles'))->download('code_barre.pdf');
    }
}