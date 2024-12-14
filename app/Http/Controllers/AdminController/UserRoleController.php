<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\RuleRequest;
use App\Models\UserRoles;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd(UserRoles::with('users'));
        $rules = UserRoles::all();
        return view('admin.userRole', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ruleForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RuleRequest $request)
    {
        $rule = new UserRoles();
        //dd($request);
        $rule->create($request->validated());
        return redirect()->route('userrole')->with('success', 'Rôle bien ajouté');
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
    public function destroy(UserRoles $rule)
    {
        $rule->delete();
        return redirect()->route('userrole')->with('success', 'Rôle bien supprimé');
    }
}