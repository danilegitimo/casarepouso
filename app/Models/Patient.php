<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model {

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

  public function responsible() {
    return $this->hasOne(User::class, 'id');
  }

}
