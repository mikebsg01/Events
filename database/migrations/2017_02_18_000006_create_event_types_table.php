<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTypesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    /**
     * Event Types - Fields
     * ============================================================= //
     */
    Schema::create('event_types', function (Blueprint $table) {
      $table->engine = 'InnoDB';

      $table->increments('id');
      $table->string('name', 25);
      $table->string('slug', 50);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('event_types');
  }
}
