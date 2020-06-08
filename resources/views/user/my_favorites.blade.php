@extends('layout')
@section('title')
My Favorites
@endsection
@section('content')
@include('partials.errors')
<div id="app" class="container">
    <div class="recipe-grid">
        @forelse ($myFavorites as $myFavorite)
        <div class="card recipe-card">
            <div class="card-header centered">
                <a href="{{route('recipes.show', $myFavorite->id)}}">
                    <img src="{{ $myFavorite->picture }}" class="card-img-top" alt="{{ $myFavorite->title }}">
                </a>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <strong> {{ $myFavorite->title }} </strong>
                </p>
            </div>
            @if (Auth::check())
            <div class="card-footer">
                <favorite :recipe="{{ $myFavorite->id }}" :favorited="{{ $myFavorite->favorited() ? 'true' : 'false' }}"></favorite>
            </div>
            @endif
        </div>
        @empty
        <p>You have no favorite recipes.</p>
        @endforelse
    </div>
</div>
@endsection