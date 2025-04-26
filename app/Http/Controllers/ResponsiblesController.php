<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResponsiblesController extends Controller
{

  public function index()
  {
    $users = User::orderBy('created_at', 'desc')->whereRoleId(1)->paginate(10);
    return view('responsibles.index', compact('users'));
  }

  public function create()
  {
    return view('responsibles.form', ['user' => null]);
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      "name"      => "required|min:3|max:255",
      "email"     => "required|min:3|max:255|unique:users,email",
      "telephone" => "required|min:10",
      "cpf"       => "required|min:10|unique:users,cpf",
      "rg"        => "bail|min:6|unique:users,rg",
      "birthdate"    => "required|date",
      "address"      => "nullable|min:5|max:255",
      "password"     => "required|min:6",
    ]);

    $validated['role_id'] = 1;

    if ( !empty($validated['password']) ) {
      $validated['password'] = Hash::make($validated['password']);
    }

    $user = User::create($validated);

    if ($user) {
      return redirect()->route('responsibles.index')
        ->with('success', 'O novo usuário foi criado!');
    } else {
      return redirect()->route('responsibles.index')
        ->with('error', 'O novo usuário não foi criado!');
    }
  }

  public function edit(string $id)
  {
    $user = User::findOrFail($id);
    return view('responsibles.form', compact('user'));
  }

  public function update(Request $request, string $id)
  {

    $user = User::findOrFail($id);

    $validated = $request->validate([
      "name"      => "required|min:3|max:255",
      "email"     => "required|min:3|max:255|unique:users,email," . $user->id,
      "telephone" => "required|min:10",
      "cpf"       => "required|min:10|unique:users,cpf," . $user->id,
      "rg"        => "bail|min:6|unique:users,rg," . $user->id,
      "birthdate"    => "required|date",
      "address"      => "nullable|min:5|max:255",
      "password"     => "nullable|min:6"
    ]);

    if ( !empty($validated['password']) ) {
      $validated['password'] = Hash::make($validated['password']);
    } else {
      unset($validated['password']);
    }

    $user->update($validated);

    if ($user) {
      return redirect()->route('responsibles.index')
        ->with('success', "O usuário {$user->name} foi atualizado!");
    } else {
      return redirect()->route('responsibles.index')
        ->with('error', "Não foi possível atualizar o usuário!");
    }
  }

  public function destroy(string $id)
  {
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('responsibles.index')
      ->with('success', "O usuário {$user->name} foi deletado!");
  }
}
