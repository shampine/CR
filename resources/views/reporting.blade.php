@include('partials.header')

<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-2">
      <h1>Reporting</h1>
      <form method="GET">
        <div class="form-group">
          <label for="charity">Charity</label>
          <select id="charity" class="form-control" name="charity">
            <option value="" disabled selected>Select One</option>
            @foreach($charities as $charity)
              <option value="{{{ $charity->id }}}">{{{ $charity->name }}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="donor">Donor</label>
          <select id="donor" class="form-control" name="donor">
          <option value="" disabled selected>Select One</option>
          @foreach($donors as $donor)
            <option value="{{{ $donor->id }}}">{{{ $donor->email }}}</option>
          @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="date_begin">Date Begin</label>
          <input id="date_begin" type="date" name="date_begin">
        </div>
        <div class="form-group">
          <label for="date_end">Date End</label>
          <input id="date_end" type="date" name="date_end">
        </div>
        <button type="submit" class="btn btn-default">Get Report</button>
      </form>
      <hr>

      @if($dataset)
        <table class="table">
          <thead>
            <tr>
              <th>Donation ID</th>
              <th>Amount</th>
              <th>Date</th>
              <th>Donor Name</th>
              <th>Donor Email</th>
              <th>Charity Name</th>
              <th>Charity EIN</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dataset as $data)
              <tr>
                <th>{{{ $data->id }}}</th>
                <th>${{{ $data->amount }}}</th>
                <th>{{{ $data->created_at }}}</th>
                <th>{{{ isset($data->donorName) ? $data->donorName : "-" }}}</th>
                <th>{{{ isset($data->donorEmail) ? $data->donorEmail : "-" }}}</th>
                <th>{{{ isset($data->charityName) ? $data->charityName : "-" }}}</th>
                <th>{{{ isset($data->charityEIN) ? $data->charityEIN : "-" }}}</th>
              </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <p>No data queried.</p>
      @endif
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-2">
      <hr>
      <a href="/">[Donate]</a>
    </div>
  </div>
</div>

@include('partials.footer')