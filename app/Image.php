<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

  protected $table = 'images';
  
  protected $fillable = [
    'file_path',
    'file_name'
  ];
}
