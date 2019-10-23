@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <div class="col-8 offset-2">
    <form method="POST" action="/card">
      @csrf
{{-- <div class="form-group row">
  <h3>Add New Card</h3>
</div> --}}
      <div class="form-group row">
          <label for="brand" class="col-md-4 col-form-label text-md-right">Brand</label>

          <div class="col-md-6">
              <select class="form-control @error('brand') is-invalid @enderror" id="brand"  name="brand" value="{{ old('brand') }}" autocomplete="brand" autofocus>
                <option>Select Card Brand</option>
                <option value="master_card">Master Card</option>
                <option value="visa_card">Visa Card</option>
                <option value="verve_card">Verve Card</option>
                <option value="others">Others</option>
              </select>

              @error('brand')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>

      <div class="form-group row">
        <label for="card_number" class="col-md-4 col-form-label text-md-right">Card Number</label>

        <div class="col-md-6">
            <input id="card_number" type="text" class="form-control @error('card_number') is-invalid @enderror" name="card_number" value="{{ old('card_number') }}" autocomplete="card_number" autofocus>

            @error('card_number')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="cvv" class="col-md-4 col-form-label text-md-right">Card CVV</label>

        <div class="col-md-6">
            <input id="cvv" type="text" class="form-control @error('cvv') is-invalid @enderror" name="cvv" value="{{ old('cvv') }}" autocomplete="cvv" autofocus>

            @error('cvv')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
      <label for="expire_at" class="col-md-4 col-form-label text-md-right">Expiry Date</label>

      <div class="col-md-6">
          <input id="expire_at" type="date" class="form-control @error('expire_at') is-invalid @enderror" name="expire_at" value="{{ old('expire_at') }}" autocomplete="expire_at" autofocus>

          @error('expire_at')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
    </div>

      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary float-right">
                Add Card
            </button>
        </div>
    </div>
    </form> 
  </div>
</div>
</div>
@endsection
