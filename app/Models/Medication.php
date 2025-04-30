<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{

  protected $fillable = [
    'name',
    'description',
    'dosage',
    'quantity',
    'period_hours'
  ];

  public function patients() {
    return $this->belongsToMany(Patient::class)->withTimestamps();
  }
}
