@extends('layout')

@section('title')
Profile
@endsection

@section('content')
@if(session()->get('success'))
<div role="alert">
  {{session()->get('success')}}
</div>
@endif
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
          <strong>Email:</strong> {{$user->email}}
        </li>
        <li>
        <strong>Bio:</strong> {{$profile->bio}}
        </li>
      </ul>
      <a href="{{route('profile.edit', $user->id)}}" class="btn btn-warning">
        Edit Profile
      </a>
    </p>
  </div>
</div>
@endsection