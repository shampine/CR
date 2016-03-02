<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donors extends Model
{

  /**
   * Define the table this model is associated with
   *
   * @var string
   */
  protected $table = 'donors';

  /**
   * Unguarded colums in the database, fillable through static methods on the model
   *
   * @var array
   */
  protected $fillable = ['name', 'email'];


  /**
   * Disable Eloquents built in timestamping
   *
   * @var bool
   */
  public $timestamps = false;

}
