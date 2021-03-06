@extends ('layout')
@section('title')
{{$recipe->title}}
@endsection
@section('content')
@include('partials.errors')
<div class="card">
  <div class="card-header centered">
    @if((strpos($recipe->picture, 'http://', 0)===false) && (strpos($recipe->picture, 'https://', 0)===false))
    <img src="{{asset('img/' .$recipe->picture)}}" class="card-img-top" alt="{{$recipe->title}}">
    @else
    <img src="{{$recipe->picture}}" class="card-img-top" alt="{{$recipe->title}}">
    @endif
    <h6>Created by: <a href="{{route('profile.show', $recipe->user->id)}}">{{$recipeUser->name}}</a></h6>
  </div>
  <div id="app">
    <div class="card-body">
      <div class="card-text">
        <h4>Ingredients:</h4>
        <ul class="ing-list">
          @foreach ($recipe->ingredients as $ingredient)
          <li>
            {{$ingredient->ingredient}}
          </li>
          @endforeach
        </ul>
        <hr>
        <h4>Directions:</h4>
        <p>
          {{$recipe->directions}}
        </p>
        <hr>
        <h4>Categories:</h4>
        <ul>
          @foreach ($recipe->categories as $category)
          <li>
            {{$category->category}}
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="card-footer">
      <ul>
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
        <li class="pull-right">
          @if (Auth::check())
          <favorite :recipe="{{ $recipe->id }}" :favorited="{{ $recipe->favorited() ? 'true' : 'false' }}">
          </favorite>
          @endif
        </li>
      </ul>
    </div>
  </div>
</div>
@endsection