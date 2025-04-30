<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Disease;
use App\Models\Medication;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller {

  public function index() {
    $patients = Patient::orderBy('created_at', 'desc')->paginate(10);
    return view('patients.index', compact('patients'));
  }

  public function create() {
    $patient = null;
    $users = User::get();
    $medications = Medication::all();
    $activities  = Activity::all();
    $diseases    = Disease::all();
    $medications_selected = null;
    $activities_selected  = null;
    $diseases_selected    = null;

    return view('patients.form', compact(
      'patient', 'users', 'medications', 'activities', 'diseases',
      'medications_selected',
      'diseases_selected',
      'activities_selected'
    ));

  }

  public function store(Request $request) {
    $validated = $request->validate([
      "name" => "required|min:3|max:255",
      "cpf"  => "required|min:10|unique:patients,cpf",
      "rg"   => "bail|min:6|unique:patients,rg",
      "gender"       => "required",
      "civil_status" => "required",
      "birthdate"    => "required|date",
      "address"      => "nullable|min:5|max:255",
      "responsible_user_id" => "required"
    ]);

    $patient = Patient::create($validated);

    if ( $request->has('diseases') ) {
      $patient->diseases()->sync($request->diseases);
    }

    if ( $request->has('medications') ) {
      $patient->medications()->sync($request->medications);
    }

    if ( $request->has('activities') ) {
      $patient->activities()->sync($request->activities);
    }

    if ( $patient ) {
      return redirect()->route('patients.index')
        ->with('success', 'O novo paciente foi criado!');
    } else {
      return redirect()->route('patients.index')
        ->with('error', 'O novo paciente não foi criado!');
    }

  }

  public function edit(Patient $patient) {
    $users = User::get();
    $medications = Medication::get();
    $activities  = Activity::get();
    $diseases    = Disease::get();
    $medications_selected = $patient->medications;
    $activities_selected  = $patient->activities;
    $diseases_selected    = $patient->diseases;

    return view('patients.form', compact(
      'patient', 'users', 'medications', 'activities', 'diseases',
      'medications_selected',
      'diseases_selected',
      'activities_selected'
    ));
  }

  public function update(Request $request, Patient $patient) {
    $validated = $request->validate([
      "name" => "required|min:3|max:255",
      "cpf"  => "required|min:10|unique:patients,cpf," . $patient->id,
      "rg"   => "bail|min:6|unique:patients,rg," . $patient->id,
      "gender"       => "required",
      "civil_status" => "required",
      "birthdate"    => "required|date",
      "address"      => "nullable|min:5|max:255",
      "responsible_user_id" => "required"
    ]);
    
    $patient->update($validated);

    if ( $request->has('diseases') ) {
      $patient->diseases()->sync($request->diseases);
    }

    if ( $request->has('medications') ) {
      $patient->medications()->sync($request->medications);
    }

    if ( $request->has('activities') ) {
      $patient->activities()->sync($request->activities);
    }

    if ( $patient ) {
      return redirect()->route('patients.index')
        ->with('success', "O paciente {$patient->name} foi atualizado!");
    } else {
      return redirect()->route('patients.index')
        ->with('error', "Não foi possível atualizar o paciente!");
    }
  }

  public function destroy(Patient $patient) {
    $patient->delete();
    return redirect()->route('patients.index')
      ->with('success', "O paciente {$patient->name} foi deletado!");
  }
  
}
