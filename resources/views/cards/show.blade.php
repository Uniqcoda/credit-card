@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class=" col-md-10">
          <div>
            <h3>My Cards</h3>
          </div>
            <table class="border table table-hover">
                <thead>
                  <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Last 4 Digits</th>
                    <th scope="col">Expiry Date </th>
                    <th scope="col"> </th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($cards as $card)
                  @if (!$card->is_deleted)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}
                  </th>
                  <td>{{$card->brand}}</td>
                    <td>{{$card->card_number}}</td>
                    <td>{{$card->expire_at}}</td>
                    <td>
                      <vue-button :brand="'{{$card->brand}}'" :number="'{{$card->card_number}}'"></vue-button>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
