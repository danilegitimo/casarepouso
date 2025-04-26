<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::table('users', function (Blueprint $table) {
      $table->string('address')->nullable()->after('role_id');
      $table->string('picture')->nullable()->after('address');
      $table->string('telephone')->nullable()->after('picture');
      $table->string('cpf')->nullable()->after('telephone');
      $table->string('rg')->nullable()->after('cpf');
      $table->date('birthdate')->nullable()->after('rg');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropColumns('users', [
      'address',
      'picture',
      'telephone',
      'cpf',
      'rg',
      'birthdate'
    ]);
  }

};
