<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Charities as Charities;
use App\Donations as Donations;
use App\Donors as Donors;

class Donate extends Controller
{

  /**
   * Handles GET requests for /
   *
   * @return view
   */
  function getDonate()
  {
    return view('donate')->with([
      "charities" => Charities::all(),
    ]);
  }

  /**
   * Handles POST requests for /
   *
   * @return redirect
   */
  function postDonate(Request $request)
  {
    $input = $request->only(['name', 'email', 'amount', 'charity']);

    $validator = \Validator::make($input, [
        'name'    => 'required',
        'email'   => 'required|email',
        'amount'  => 'required|numeric|between:0.01,99999.99',
        'charity' => 'exists:charities,id',
    ]);

    if($validator->fails()) {
      return redirect()->back()->with('error', []);
    }

    $donor = Donors::where('email', $input['email'])->first();

    if($donor === null) {
      $donor = Donors::create([
        'name'  => $input['name'],
        'email' => $input['email']
      ]);
    }

    $donation = Donations::create([
      'donor'   => $donor->id,
      'charity' => $input['charity'],
      'amount'  => $input['amount'],
    ]);

    return redirect()->back()->with('success', []);
  }

}
