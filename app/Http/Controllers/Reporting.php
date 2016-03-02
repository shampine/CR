<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Charities as Charities;
use App\Donations as Donations;
use App\Donors as Donors;

class Reporting extends Controller
{


  /**
   * Handles GET requests for /reporting/charity
   *
   * @return view
   */
  function getCharityReport()
  {
    return view('charity')->with([
      "donations" => "42",
    ]);
  }

}
