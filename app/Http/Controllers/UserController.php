<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Disease;
use App\Models\Medication;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {

  public function index() {
    return view('index', [
      'users'       => User::all(),
      'patients'    => Patient::all(),
      'medications' => Medication::all(),
      'diseases'    => Disease::all(),
      'activities'  => Activity::all()
    ]);
  }

  public function show(string $id) {
    $user = User::findOrFail($id);
    return view('users.index', compact('user'));
  }

}
