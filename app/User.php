<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'first_name', 
    'last_name',
    'username',
    'email',
    'password',
    'profile_image_id',
    'location_id',
    'telephone',
    'bio',
    'url_facebook',
    'url_twitter',
    'url_google_plus',
    'url_linkedin',
    'url_instagram',
    'url_pinterest'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 
    'remember_token'
  ];
}
