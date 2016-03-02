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
   * @param $request array
   *
   * @return view
   */
  function getReporting(Request $request)
  {
    $dataset = false;
    $input   = $request->only(['charity', 'donor', 'date_begin', 'date_end']);

    if (isset($input['charity'])) {
      $dataset = Donations::queryCharityDonationsWithDonor($input['charity']);
    } else if (isset($input['donor'])) {
      $dataset = Donations::queryDonorsDonationsWithCharity($input['donor']);
    } else if (isset($input['date_begin']) && isset($input['date_end'])) {
      $dataset = Donations::queryDonationsByDate($input['date_begin'], $input['date_end']);
    }

    return view('reporting')->with([
      "charities" => Charities::all(),
      "donors"    => Donors::all(),
      "dataset"   => $dataset,
    ]);
  }

}
