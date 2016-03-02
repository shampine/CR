<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charities extends Model
{

  /**
   * Define the table this model is associated with
   *
   * @var string
   */
  protected $table = 'charities';


  /**
   * Returns a specific charities donations
   *
   * @param $id string
   *
   * @return array
   */
  public static function queryCharityDonations($id)
  {

  }

}
