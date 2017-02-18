<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    /**
     * Images - Fields
     * ============================================================= //
     */
    Schema::create('images', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      
      $table->increments('id');
      $table->string('file_path', 255);
      $table->string('file_name', 255);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('images');
  }
}
