<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('roles', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('description');
      $table->timestamps();
      $table->softDeletes();
    });

    Schema::table('users', function (Blueprint $table) {
      $table->foreignIdFor(Role::class)->after('password');
    });

  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('roles');
    Schema::dropColumns('users', 'role_id');
  }

};
