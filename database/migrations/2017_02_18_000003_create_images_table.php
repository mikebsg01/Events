<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Image;

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
      $table->timestamps();
    });

    Image::create([
      'file_path' => 'public/assets/img/v1/',
      'file_name' => 'user-256x256.png'
    ]);
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
