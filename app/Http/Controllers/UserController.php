<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {

  public function index() {
    return view('index', [
      'users' => User::all()
    ]);
  }

  public function show(string $id) {
    $user = User::findOrFail($id);
    return view('users.index', compact('user'));
  }

}
