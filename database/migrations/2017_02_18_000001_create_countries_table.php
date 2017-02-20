<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Country;

class CreateCountriesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    /**
     * Countries - Fields
     * ============================================================= //
     */
    Schema::create('countries', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      
      $table->increments('id');
      $table->string('name', 45);
      $table->string('alpha2_code', 5);
      $table->timestamps();
    });

    Country::create([
      'name'  => 'NONE'
    ]);

    $countries = json_decode(File::get('database/seeds/datafiles/countries.json'));

    foreach($countries as $country) {
      Country::create([
        'name'        => $country->name,
        'alpha2_code' => $country->alpha2Code
      ]);
    }
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('countries');
  }
}