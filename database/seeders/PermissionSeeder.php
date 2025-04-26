<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder {

  /**
   * Run the database seeds.
   */
  public function run(): void {

    Permission::updateOrCreate([
      "name"        => "view_permissions",
      "description" => "Exibir todas as permissões existentes",
      "role_id"     => 1
    ]);

  }

}
