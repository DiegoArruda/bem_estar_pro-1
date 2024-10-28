<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /* Verifica se o usuário é admin através do GATE */
        if (Gate::allows('admin')) {
            $users = User::where('name', 'like', '%' . $request->busca . '%')
                ->orderBy('name', 'asc')
                ->paginate(10);

            $totalUsers = User::count();

            return view('admin.users.index', compact('users', 'totalUsers'));
        } else {
            return back();
        }
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
            'password' => 'required|string|min:6'
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
    public function show(User $user) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->with('error', 'Usuário não encontrado.');
        }

        if (auth()->user()->id == $user['id'] || auth()->user()->id == 1) {
            return view('admin.users.edit', compact('user'));
        } else {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:6'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        if(Gate::allows('admin')){
            return redirect()->route('users.index')->with('success','Usuário alterado com sucesso!');
        }else{
            return redirect()->route('users.edit', $user->id)->with('success','Usuário alterado com sucesso!');
        }
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
