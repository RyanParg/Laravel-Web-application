@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!<br>
                    Welcome {{Auth::user()->name}}<br>
                    <form method="POST" action="{{ route('profile.store') }}" >
                      @csrf
                      @if(Auth::user()->profile)
                        Bio:
                        <p class="container"> <textarea type="text" name="bio"
                        >{{ Auth::user()->profile->bio }}</textarea></p>
                        Phone Number: 
                        <p class="container"><input type="text" name="phone_number"
                        value="{{ Auth::user()->profile->phone_number }}"></p>
                      @else
                        <p>Bio: <textarea type="text" name="bio"
                        ></textarea></p>

                        <p>Phone Number: <input type="text" name="phone_number"
                          ></p>
                      @endif
                        <input type="submit" value="Submit">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
