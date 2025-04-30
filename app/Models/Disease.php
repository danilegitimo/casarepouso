<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Disease extends Model
{

  protected $fillable = [
    'name',
    'description'
  ];

  public function patients()
  {
    return $this->belongsToMany(Patient::class)->withTimestamps();
  }
}
