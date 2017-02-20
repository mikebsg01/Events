<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {
  
  protected $table = 'locations';

  protected $fillable = [
    'first_address',
    'second_address',
    'country_id',
    'state',
    'zip_code'
  ];
}