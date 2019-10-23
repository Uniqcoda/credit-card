@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
          <div class="card">
              <div class="card-header">Dashboard</div>

              <div class="card-body  d-flex  justify-content-between">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  Welcome, What would you like to do?
              </div>
          </div>
        </div>
          
<div class="tabbable pt-5">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#tab1" data-toggle="tab">All Cards</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#tab2" data-toggle="tab">Deleted Cards</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#tab3" data-toggle="tab">All Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#tab4" data-toggle="tab">Blocked Users</a>
      </li>
    </ul>

      <div class="tab-content">

        {{-- Table of all cards --}}
        <div class="tab-pane active" id="tab1">
            <table class="border table table-hover">
              <thead>
                <tr>
                  <th scope="col">S/N</th>
                  <th scope="col">Brand</th>
                  <th scope="col">Last 4 Digits</th>
                  <th scope="col">User</th>
                  <th scope="col">Expiry At</th>
                  <th scope="col">Added At</th>
                  <th scope="col">Status </th>
                  <th scope="col">Send Mail </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cards as $card)
                <tr>
                  <th scope="row">{{ $loop->iteration }}
                </th>
                <td>{{$card->brand}}</td>
                  <td>{{$card->card_number}}</td>
                  <td>User</td>
                  <td>
                    @php
                        $diffence = $card->dateDifference($card->expire_at);
                        echo($diffence)
                    @endphp
                  </td>
                  <td>{{$card->dateDifference($card->created_at)}}</td>
                  @if ($card->is_deleted)
                  <td class="text-danger">Deleted</td>
                  @else
                  <td class="text-success">Not Deleted</td>

                  @endif
                  @if ($diffence == 'today' && !$card->is_deleted)
                  <td>
                  <mail-button :diffence="'{{$diffence}}'" :card_id="'{{$card->id}}'" :user_id="'{{$card->user_id}}'">
                    </mail-button>
                  </td>
                  @else
                  <td></td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

            {{-- Table of deleted cards --}}

  <div class="tab-pane" id="tab2">
      <table class="border table table-hover">
        <thead>
          <tr>
            <th scope="col">S/N</th>
            <th scope="col">Brand</th>
            <th scope="col">Last 4 Digits</th>
            <th scope="col">User</th>
            <th scope="col">Expiry Date</th>
            <th scope="col">Added At</th>
            <th scope="col">Status </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($cards as $card)
          @if ($card->is_deleted)              
          <tr>
            <th scope="row">{{ $loop->iteration }}
          </th>
          <td>{{$card->brand}}</td>
            <td>{{$card->card_number}}</td>
            <td>User</td>
            <td>{{$card->dateDifference($card->expire_at)}}</td>
            <td>{{$card->dateDifference($card->created_at)}}</td>
            <td class="text-danger">Deleted</td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>

          {{-- Table of all users --}}

            <div class="tab-pane" id="tab3">
            <table class="border table table-hover">
                <thead>
                  <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name </th>
                    <th scope="col">Email</th>
                    <th scope="col">Date Added </th>
                    <th scope="col">Status </th>
                    <th scope="col"> </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}
                  </th>
                  <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    @if ($user->is_blocked)
                    <td>Blocked</td>
                    <td>
                    <button class="btn btn-primary btn-sm">Unblock</button>
                  </td>
                    @else
                    <td>Not Blocked</td>
                    <td> 
                    <button class="btn btn-danger btn-sm">Block</button>
                  </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

                      {{-- Table of blocked users --}}

                      <div class="tab-pane" id="tab4">
                          <table class="border table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">S/N</th>
                                  <th scope="col">First Name</th>
                                  <th scope="col">Last Name </th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Date Added </th>
                                  <th scope="col">Status </th>
                                  <th scope="col"> </th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($users as $user)
                                @if ($user->is_blocked)             <tr>
                                  <th scope="row">{{ $loop->iteration }}
                                </th>
                                <td>{{$user->first_name}}</td>
                                  <td>{{$user->last_name}}</td>
                                  <td>{{$user->email}}</td>
                                  <td>{{$user->created_at}}</td>
                                  <td>Blocked</td>
                                  <td>
                                  <button class="btn btn-primary btn-sm">Unblock</button>
                                </td>
                                </tr>
                                @endif
                                @endforeach
                              </tbody>
                            </table>
                          </div>
</div>
        </div>

    </div>
</div>
@endsection
