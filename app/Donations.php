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

  /**
   * Returns all donations for a given charity with donor info
   *
   * @param $id string
   *
   * @return array
   */
  public static function queryCharityDonationsWithDonor($id)
  {
    return self::where('charity', $id)
                ->join('donors', 'donations.donor', '=', 'donors.id')
                ->select('donations.id as id', 'amount', 'created_at', 'donors.name as donorName', 'donors.email as donorEmail')
                ->get();
  }

  /**
   * Returns all donations for a given donor with charity info
   *
   * @param $id string
   *
   * @return array
   */
  public static function queryDonorsDonationsWithCharity($id)
  {
    return self::where('donor', $id)
                ->join('charities', 'donations.charity', '=', 'charities.id')
                ->select('donations.id as id', 'amount', 'created_at', 'charities.name as charityName', 'charities.ein as charityEIN')
                ->get();
  }

  /**
   * Returns all donations for a given time period with charity/donor info
   *
   * @param $begin string
   * @param $end string
   *
   * @return array
   */
  public static function queryDonationsByDate($begin, $end)
  {
    return self::whereBetween('created_at', [$begin, $end])
                ->join('donors', 'donations.donor', '=', 'donors.id')
                ->join('charities', 'donations.charity', '=', 'charities.id')
                ->select('donations.id as id', 'amount', 'created_at', 'donors.name as donorName', 'donors.email as donorEmail', 'charities.name as charityName', 'charities.ein as charityEIN')
                ->get();
  }

}
