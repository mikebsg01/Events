<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    /**
     * Users - Fields
     * ============================================================= //
     */
    Schema::create('users', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      
      $table->increments('id');
      $table->string('first_name', 45);
      $table->string('last_name', 45);
      $table->string('full_name', 90);
      $table->string('username', 25)->unique();
      $table->string('email', 255)->unique();
      $table->string('password', 512);
      $table->integer('profile_image_id')->unsigned();
      $table->integer('location_id')->unsigned();
      $table->string('telephone', 10)->nullable();
      $table->text('bio', 512)->nullable();
      $table->string('url_facebook', 255)->nullable();
      $table->string('url_twitter', 255)->nullable();
      $table->string('url_google_plus', 255)->nullable();
      $table->string('url_linkedin', 255)->nullable();
      $table->string('url_instagram', 255)->nullable();
      $table->string('url_pinterest', 255)->nullable();
      $table->rememberToken();
      $table->timestamps();

      /**
       * Users - Foreign Keys
       * ============================================================= //
       */
      $table->foreign('profile_image_id')
            ->references('id')->on('images');

      $table->foreign('location_id')
            ->references('id')->on('locations');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('users');
  }
}
