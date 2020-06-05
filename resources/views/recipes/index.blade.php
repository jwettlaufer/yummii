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
<ul id="app" class="recipe-grid">
  @foreach($recipes as $recipe)
  <li>
    <div class="card recipe-card">
      <a href="{{route('recipes.show', $recipe->id)}}">
        <img src="{{$recipe->picture}}" class="card-img-top" alt="{{$recipe->title}}">
      </a>
      <div class="card-body">
        <p class="card-text">
          <strong>{{$recipe->title}}</strong>
        </p>
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

@endsection