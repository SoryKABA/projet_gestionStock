<?php

namespace App\Http\Controllers\AdminController;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UsersCommunications;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminRequest\CommunicateRequest;
use App\Models\Articles;

class UsersCommunicateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Articles::orderBy('created_at', 'desc')->get();
        return view('admin.userscommunication', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.formcommunicate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [];
        dd($request);
        $messages = Articles::all();
        foreach ($messages as $message) {
            foreach ($request->checked as $name) {
                if ($message->title === $name) {
                    $data[$name][$request->quantity] = $message->imageArticle();
                }
            }
        }

        dd($data);
        $articles = new Articles();
        //dd(Auth::users()->id);
        $message->create($request->validated());
        $message->user()->associate(Auth::user()->id);
        return redirect()->route('admin.articles.index')->with('success', "Message envoyé");
    }

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}