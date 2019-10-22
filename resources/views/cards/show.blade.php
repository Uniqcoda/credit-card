@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Last 4</th>
                    <th scope="col">Expiry Date </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cards as $card)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}
                  </th>
                  <td>{{$card->brand}}</td>
                    <td>{{$card->card_number}}</td>
                    <td>{{$card->expire_at}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
