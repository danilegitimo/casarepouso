<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{

  use SoftDeletes;

  /**
   * 
   * 
   */
  protected $fillable = [
    'name',
    'cpf',
    'rg',
    'gender',
    'civil_status',
    'birthdate',
    'address',
    'picture',
    'responsible_user_id'
  ];

  protected $casts = [
    'birthdate' => 'datetime'
  ];

  public function responsible()
  {
    return $this->hasOne(User::class, 'id', 'responsible_user_id');
  }

  public function medications()
  {
    return $this->belongsToMany(Medication::class)->withTimestamps();
  }

  public function activities()
  {
    return $this->belongsToMany(Activity::class)->withTimestamps();
  }

  public function diseases()
  {
    return $this->belongsToMany(Disease::class)->withTimestamps();
  }
}
