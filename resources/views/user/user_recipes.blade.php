@extends('layout')
@section('title')
My Recipes
@endsection
@section('content')
@include('partials.errors')
<div id="app" class="container">
    <ul class="recipe-grid">
        @forelse ($userRecipes as $userRecipe)
        <li>
            <div class="card recipe-card">
                <div class="card-header centered">
                    <a href="{{route('recipes.show', $userRecipe->id)}}">
                        @if((strpos($userRecipe->picture, 'http://', 0)===false) && (strpos($userRecipe->picture, 'https://', 0)===false))
                        <img src="{{asset('img/' .$userRecipe->picture)}}" class="card-img-top" alt="{{$userRecipe->title}}">
                        @else
                        <img src="{{ $userRecipe->picture }}" class="card-img-top" alt="{{ $userRecipe->title }}">
                        @endif
                    </a>
                </div>
                <div class="card-body">
                    <p class="card-text centered">
                        <strong> {{ $userRecipe->title }} </strong>
                    </p>
                </div>
                <div class="card-footer">
                    <div class="pull-right">
                        @if (Auth::check())
                        <favorite :recipe="{{ $userRecipe->id }}" :favorited="{{ $userRecipe->favorited() ? 'true' : 'false' }}"></favorite>
                    </div>
                </div>
                @endif
        </li>
        @empty
        <p>You have no created recipes.</p>
        @endforelse
    </ul>
</div>
@endsection