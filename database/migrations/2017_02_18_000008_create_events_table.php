<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    /**
     * Events - Fields
     * ============================================================= //
     */
    Schema::create('events', function (Blueprint $table) {
      $table->engine = 'InnoDB';

      $table->increments('id');
      $table->string('name', 45);
      $table->string('slug', 90);
      $table->integer('image_id')->unsigned();
      $table->string('description', 1024)->nullable();
      $table->integer('location_id')->unsigned();
      $table->timestamp('start_date')->default('0000-00-00 00:00:00');
      $table->timestamp('end_date')->default('0000-00-00 00:00:00');
      $table->integer('organizator_id')->unsigned();
      $table->string('event_email', 255);
      $table->boolean('is_public');
      $table->boolean('is_shareable');
      $table->boolean('only_invite');
      $table->boolean('show_remaining');
      $table->boolean('has_password');
      $table->string('password', 512)->nullable();
      $table->integer('event_type_id')->unsigned();
      $table->integer('category_id')->unsigned();
      $table->timestamps();

      /**
       * Events - Foreign Keys
       * ============================================================= //
       */
      $table->foreign('image_id')
            ->references('id')->on('images');

      $table->foreign('location_id')
            ->references('id')->on('locations');

      $table->foreign('organizator_id')
            ->references('id')->on('users');

      $table->foreign('event_type_id')
            ->references('id')->on('event_types');

      $table->foreign('category_id')
            ->references('id')->on('categories');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('events');
  }
}
