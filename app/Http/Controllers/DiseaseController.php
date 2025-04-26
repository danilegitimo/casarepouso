<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller {
  public function index() {
    $diseases = Disease::orderBy('created_at', 'desc')->paginate(10);
    return view('diseases.index', compact('diseases'));
  }

  public function create() {
    return view('diseases.form', ['disease' => null]);
  }

  public function store(Request $request) {
    $validated = $request->validate([
      "name"         => "required|min:3|max:255",
      "description"  => "required|min:3|max:255"
    ]);
    
    $disease = Disease::create($validated);

    if ( $disease ) {
      return redirect()->route('diseases.index')
        ->with('success', 'A doença foi criada!');
    } else {
      return redirect()->route('diseases.index')
        ->with('error', 'Não foi possível criar a doença!');
    }

  }

  public function edit(Disease $disease) {
    return view('diseases.form', compact('disease'));
  }

  public function update(Request $request, Disease $disease) {
    $validated = $request->validate([
      "name"         => "required|min:3|max:255",
      "description"  => "required|min:3|max:255",
    ]);
    
    $disease->update($validated);

    if ( $disease ) {
      return redirect()->route('diseases.index')
        ->with('success', "O doença {$disease->name} foi atualizado!");
    } else {
      return redirect()->route('diseases.index')
        ->with('error', "Não foi possível atualizar o doença!");
    }
  }

  public function destroy(Disease $disease) {
    $disease->delete();
    return redirect()->route('diseases.index')
      ->with('success', "A doença {$disease->name} foi deletado!");
  }
}
