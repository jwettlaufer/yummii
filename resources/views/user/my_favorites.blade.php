@extends('layout')
@section('title')
My Favorites
@endsection
@section('content')
@include('partials.errors')
<div id="app" class="container">
    <ul class="recipe-grid">
        @forelse ($myFavorites as $myFavorite)
        <li>
            <div class="card recipe-card">
                <div class="card-header centered">
                    <a href="{{route('recipes.show', $myFavorite->id)}}">
                        @if((strpos($myFavorite->picture, 'http://', 0)===false) && (strpos($myFavorite->picture, 'https://', 0)===false))
                        <img src="{{asset('img/' .$myFavorite->picture)}}" class="card-img-top" alt="{{$myFavorite->title}}">
                        @else
                        <img src="{{ $myFavorite->picture }}" class="card-img-top" alt="{{ $myFavorite->title }}">
                        @endif
                    </a>
                </div>
                <div class="card-body">
                    <p class="card-text centered">
                        <strong> {{ $myFavorite->title }} </strong>
                    </p>
                </div>
                <div class="card-footer">
                    <div class="pull-right">
                        @if (Auth::check())
                        <favorite :recipe="{{ $myFavorite->id }}" :favorited="{{ $myFavorite->favorited() ? 'true' : 'false' }}"></favorite>
                    </div>
                </div>
        </li>
        @endif

        @empty
        <p>You have no favorite recipes.</p>
        @endforelse
    </ul>
</div>
@endsection