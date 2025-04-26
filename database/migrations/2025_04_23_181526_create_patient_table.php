<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('patients', function (Blueprint $table) {
      $table->id();
      $table->string('name', length: 255);
      $table->string('cpf');
      $table->string('rg');
      $table->enum('gender', ['female', 'male', 'other']);
      $table->enum('civil_status', ['single', 'married', 'separate', 'widowed']);
      $table->date('birthdate');
      $table->string('address');
      $table->string('picture')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('patients');
  }
   
};
