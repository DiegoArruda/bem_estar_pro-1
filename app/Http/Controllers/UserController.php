<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::where('name', 'like', '%' . $request->busca . '%')
                    ->orderBy('name', 'asc')
                    ->paginate(10);

        $totalUsers = User::count();

        return view('admin.users.index', compact('users', 'totalUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->with('error', 'Usuário não encontrado.');
        }

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255' ,
            'password' => 'nullable|string|min:8'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso.');
        }

        return back()->with('error', 'Usuário não encontrado.');
    }
}

