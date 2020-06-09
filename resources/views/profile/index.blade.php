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
    @if((strpos($profile->profile_pic, 'http://', 0)===false) && (strpos($profile->profile_pic, 'https://', 0)===false))
    <img src="{{asset('img/' .$profile->profile_pic)}}" class="card-img-top" alt="{{$user->name . ' picture'}}">
    @else
    <img src="{{ $profile->profile_pic }}" class="img-responsive img-thumbnail rounded" alt="{{$user->name . ' picture'}}" style="width: 150px;" />
    @endif
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
      <a href="{{route('profile.edit', $user->id)}}" class="btn btn-warning">
        Edit Profile
      </a>
    </p>
  </div>
</div>
@endsection