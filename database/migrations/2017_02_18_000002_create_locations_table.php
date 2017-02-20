<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Location;

class CreateLocationsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    /**
     * Locations - Fields
     * ============================================================= //
     */
    Schema::create('locations', function(Blueprint $table) {
      $table->engine = 'InnoDB';
      
      $table->increments('id');
      $table->string('first_address', 60);
      $table->string('second_address', 60);
      $table->integer('country_id')->unsigned();
      $table->string('state', 45);
      $table->string('zip_code', 5);
      $table->timestamps();
      
      /**
       * Locations - Foreign Keys
       * ============================================================= //
       */
      $table->foreign('country_id')
            ->references('id')->on('countries')
            ->onDelete('cascade');
    });

    Location::create([
      'first_address' => 'NONE',
      'country_id'    => 1,
      'state'         => 'NONE',
      'zip_code'      => 'XXXXX'
    ]);
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('locations');
  }
}
