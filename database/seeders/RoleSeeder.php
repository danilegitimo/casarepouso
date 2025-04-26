<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder {

  /**
   * Run the database seeds.
   */
  public function run(): void {

    // Responsável
    Role::updateOrCreate([
      "id"   => 1,
      "name" => "Responsável",
      "description" => "Esse perfil é responsável pelo paciente. Poderá ver suas atividades, prontuário digital, refeições e mais"
    ]);
    
  }

}
