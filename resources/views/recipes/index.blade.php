@extends('layout')

@section('title')
Recipe Feed
@endsection
@section('content')
@if(session()->get('success'))
<div role="alert">
  {{session()->get('success')}}
</div>
@endif
@include('partials.errors')
<!--List of Recipes
<ul id="app">
  @foreach($recipes as $recipe)
  <li>
    <div class="card">
      <div class="card-header">
        <h2>
          <img src="{{url('/img/logo.png')}}" style="height: 50px; width: 50px; border-radius: 50%;" class="img-responsive">
          <a href="{{route('profile.show', $recipe->user->id)}}">
            {{$recipe->recipe_name}}
          </a>
        </h2>
      </div>
      <div class="card-body">
        <p class="card-text">
        <p>
            {{ $recipe->picture }}
        </p>
      </div>
      <div class="card-footer">
        <ul>
          <li>
            <a href="{{route('posts.show', $post->id)}}" class="btn btn-link">
              Read More
            </a>
          </li>
          <li class="pull-right">
            @if (Auth::check())
            <like :post="{{ $post->id }}" :liked="{{ $post->liked() ? 'true' : 'false' }}">
            </like>
            @endif
          <li>
        </ul>
      </div>
    </div>
  </li>
  @endforeach
</ul>
<div class="row">
  <div class="col-12 text-enter">
    {{$recipes->links()}}
  </div>
</div>
-->
@endsection