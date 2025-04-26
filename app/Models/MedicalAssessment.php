<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalAssessment extends Model {

  use SoftDeletes;
  
  protected $fillable = [
    'title',
    'description',
    'patient_id'
  ];

  public function patient(): HasOne {
    return $this->hasOne(Patient::class);
  }

}
