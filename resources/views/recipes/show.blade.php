@extends ('layout')
@section('title')
<div class="centered">{{$recipe->title}}</div>
@endsection
@section('content')
@include('partials.errors')
<div class="card">
  <div class="card-header centered">
  <img src="{{ asset('/img/'.$recipe->picture)}}" class="card-img-top" alt="{{$recipe->title}}">
  <h6>Created by: <a href="{{route('profile.show', $recipe->user->id)}}">{{$recipeUser->name}}</a></h6>
  </div>
  <div id="app">
    <div class="card-body">
      <p class="card-text">
        <strong>Directions:</strong>
        <br>
        {{$recipe->directions}}
      </p>
    </div>
    <div class="card-footer">
      <ul class="pull-right">
        @auth
        <li>
          <a href="{{route('recipes.edit', $recipe->id)}}" class="btn btn-primary btn-sm">
            Edit Recipe
          </a>
        </li>
        <li>
          <form action="{{route('recipes.destroy', $recipe->id)}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete Recipe" class="btn btn-danger btn-sm">
          </form>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</div>
@endsection