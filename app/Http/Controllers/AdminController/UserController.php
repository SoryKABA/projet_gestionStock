<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\EditRequest;
use App\Http\Requests\AdminRequest\UserRequest;
use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(UserRoles::with('users')->paginate(1)[0]);
        //dd(User::with('userRoles')->paginate(1)[0]->userRoles->title);
        return view('admin.users', [
            'users' => User::with('userRoles')->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'admin.userscreate',
            [
                'user' => new User(),
                'rules' => UserRoles::select('title', 'id')->get()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // dd($request);
        $user = new User();
        $data = $request->validated();
        $data['password'] = Hash::make($request->validated('password'));
        $image = $request->validated('imageProfil');
        $data['email'] = $request->validated('email') ?? substr(strtolower($request->validated('lastname')), 0, 1) . '' . strtolower($request->validated('name')) . rand(1, 1000) . '@' . 'agence.gn';

        if ($image === null) {
            return $data;
        }

        if ($user->imageProfil) {
            Storage::disk('public')->delete($user->imageProfil);
        }

        $data['imageProfil'] = $image->store('users', 'public');
        $user->create($data);
        $user->userRoles()->associate($request->validated('user_roles_id'));
        return redirect()->route('users')->with('success', 'Utilisateur créé avec succès');
    }
    public function passwordInit(User $user)
    {
        $user->update(['password' => Hash::make("00000000")]);
        return back()->with('success', 'Le mot de passe de ' . $user->lastname . ' ' . $user->name  . ' a bien été réinitialisé !');
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
    public function edit(User $user)
    {
        return view('admin.userEdit', ['user' => $user, 'rules' => UserRoles::select('title', 'id')->get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();

        if ($data['passwd'] !== $data['password']) {
            return redirect()->route('user.edit', $user)->with('success', 'Deux mots de passe ne correspondent pas');
        }
        $data['password'] = Hash::make($request->validated('password'));
        $user->update($data);
        $user->userRoles()->associate($request->validated('user_roles_id'));
        return redirect()->route('user.index')->with('success', 'Votre profil a bien été mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'L\'utilisateur a été supprimé avec succès');
    }
}