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

                    <div class='links justify-content-between'>
                    <a href="#">View All Users</a>
                    |
                    <a href="#">View Blocked Users</a>
                    |
                    <a href="#"></a>
                    </div>
                </div>
            </div>

{{-- Table of users --}}
            <table class="table table-hover">
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
                  @if ($user->isBlocked)
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
                  <td>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

        </div>

    </div>
</div>
@endsection
