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
                    <a href="#">Edit Profile</a>
                    |
                    <a href="/cards">View Cards</a>
                    |
                    <a href="/card">Add New Card</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
