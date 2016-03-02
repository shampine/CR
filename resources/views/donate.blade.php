@include('partials.header')

<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-2">
      <h1>Donate</h1>
      @if(session()->has('error'))
        <div class="alert alert-danger" role="alert">Invalid input. Please try again.</div>
      @elseif(session()->has('success'))
        <div class="alert alert-success" role="alert">Successfully donated!</div>
      @endif
      <form method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="amount">Amount</label>
          <input type="number" min="0.01" step="0.01" id="amount" name="amount" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="charity">Charity</label>
          <select id="charity" name="charity" class="form-control" required>
            @foreach($charities as $charity)
              <option value="{{{ $charity->id }}}">{{{ $charity->name }}}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-default">Donate</button>
      </form>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-2">
      <hr>
      <a href="/reporting/">[View Reports]</a>
    </div>
  </div>
</div>

@include('partials.footer')