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
<div class="container">
  @if(isset($details))
  <p>Recipes related to your search {{ $query }} are:</p>
  @endif
</div>
<ul id="app" class="recipe-grid">
  @foreach($recipes as $recipe)
  <li>
    <div class="card recipe-card">
      <a href="{{route('recipes.show', $recipe->id)}}">
        @if((strpos($recipe->picture, 'http://', 0)===false) && (strpos($recipe->picture, 'https://', 0)===false))
        <img src="{{asset('img/' .$recipe->picture)}}" class="card-img-top" alt="{{$recipe->title}}">
        @else
        <img src="{{$recipe->picture}}" class="card-img-top" alt="{{$recipe->title}}">
        @endif
      </a>
      <div class="card-body">
        <p class="card-text">
          <strong>{{$recipe->title}}</strong>
        </p>
      </div>
      <div class="card-footer">
        <div class="pull-right">
          @if (Auth::check())
          <favorite :recipe="{{ $recipe->id }}" :favorited="{{ $recipe->favorited() ? 'true' : 'false' }}">
          </favorite>
          @endif
        </div>
      </div>
    </div>
  </li>
  @endforeach
</ul>

<div class="row">
  <div class="col-12 text-enter">
    {{$recipes ?? ''->links()}}
  </div>
</div>

@endsection