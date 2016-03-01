@include('partials.header')

<div class="container">

    <form>
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
            <input type="text" id="amount" name="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="charity">Charity</label>
            <select id="charity" name="charity" class="form-control">
                <option disabled selected>Select One</option>
                <!-- foreach loop of charities -->
            </select>
        </div>
        <button type="submit">Donate</button>
    </form>
</div>

@include('partials.footer')