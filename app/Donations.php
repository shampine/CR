<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{

  /**
   * Define the table this model is associated with
   *
   * @var string
   */
  protected $table = 'donations';

  /**
   * Unguarded colums in the database, fillable through static methods on the model
   *
   * @var array
   */
  protected $fillable = ['donor', 'charity', 'amount'];

}
