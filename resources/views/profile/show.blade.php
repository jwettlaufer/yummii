@extends('layout')

@section('title')
Profile
@endsection
@section('content')
@include('partials.errors')
<div class="card">
  <div class="card-header">
    <img src="{{ $profile->profile_pic }}" class="img-responsive img-thumbnail rounded" alt="Profile picture" style="width: 150px;"/>
    <h2>{{$user->name}}</h2>
  </div>
  <div class="card-body">
    <p class="card-text">
      <ul>
        <li>
          <strong>Email:</strong> <p>{{$user->email}}</p>
        </li>
        <li>
        <strong>Bio:</strong> <p>{{$profile->bio}}</p>
        </li>
      </ul>
    </p>
  </div>
</div>
@endsection