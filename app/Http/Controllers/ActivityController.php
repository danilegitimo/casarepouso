<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller {
  
  public function index() {
    $activities = Activity::orderBy('created_at', 'desc')->paginate(10);
    return view('activities.index', compact('activities'));
  }

  public function create() {
    return view('activities.form', ['activity' => null]);
  }

  public function store(Request $request) {
    $validated = $request->validate([
      "name"        => "required|min:3|max:255",
      "description" => "nullable|min:5"
    ]);
    
    $activity = Activity::create($validated);

    if ( $activity ) {
      return redirect()->route('activities.index')
        ->with('success', 'A nova atividade foi criado!');
    } else {
      return redirect()->route('activities.index')
        ->with('error', 'A nova atividade não foi criado!');
    }

  }

  public function edit(Activity $activity) {
    return view('activities.form', compact('activity'));
  }

  public function update(Request $request, Activity $activity) {
    $validated = $request->validate([
      "name"        => "required|min:3|max:255",
      "description" => "nullable|min:5"
    ]);
    
    $activity->update($validated);

    if ( $activity ) {
      return redirect()->route('activities.index')
        ->with('success', "A atividade {$activity->name} foi atualizado!");
    } else {
      return redirect()->route('activities.index')
        ->with('error', "Não foi possível atualizar a atividade!");
    }
  }

  public function destroy(Activity $activity) {
    $activity->delete();
    return redirect()->route('activities.index')
      ->with('success', "A atividade {$activity->name} foi deletada!");
  }
}
