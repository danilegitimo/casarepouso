<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller {
  public function index() {
    $medications = Medication::orderBy('created_at', 'desc')->paginate(10);
    return view('medications.index', compact('medications'));
  }

  public function create() {
    return view('medications.form', ['medication' => null]);
  }

  public function store(Request $request) {
    $validated = $request->validate([
      "name"         => "required|min:3|max:255",
      "description"  => "required|min:3|max:255",
      "dosage"       => "required|numeric",
      "quantity"     => "required|integer",
      "period_hours" => "required|integer",
    ]);
    
    $medication = Medication::create($validated);

    if ( $medication ) {
      return redirect()->route('medications.index')
        ->with('success', 'O medicamento foi criado!');
    } else {
      return redirect()->route('medications.index')
        ->with('error', 'Não foi possível criar o medicamento!');
    }

  }

  public function edit(Medication $medication) {
    return view('medications.form', compact('medication'));
  }

  public function update(Request $request, Medication $medication) {
    $validated = $request->validate([
      "name"         => "required|min:3|max:255",
      "description"  => "required|min:3|max:255",
      "dosage"       => "required|numeric",
      "quantity"     => "required|integer",
      "period_hours" => "required|integer",
    ]);
    
    $medication->update($validated);

    if ( $medication ) {
      return redirect()->route('patients.index')
        ->with('success', "O medicamento {$medication->name} foi atualizado!");
    } else {
      return redirect()->route('patients.index')
        ->with('error', "Não foi possível atualizar o medicamento!");
    }
  }

  public function destroy(Medication $medication) {
    $medication->delete();
    return redirect()->route('medications.index')
      ->with('success', "O medicamento {$medication->name} foi deletado!");
  }
}
