<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function toggleRole(User $user)
    {
        // Nu te poti retrage singur rolul de admin (sa nu ramana site-ul fara admin)
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Nu îți poți modifica propriul rol.');
        }

        $user->role = $user->isAdmin() ? 'client' : 'admin';
        $user->save();

        $mesaj = $user->isAdmin()
            ? "{$user->name} este acum administrator."
            : "{$user->name} este acum client.";

        return back()->with('success', $mesaj);
    }
}
