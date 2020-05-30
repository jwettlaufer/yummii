@extends('layout')

@section('title')
Add Recipe
@endsection
@section('content')
@include('partials.errors')
<form method="post" action="{{route('recipes.store')}}">
    @csrf
    <div class="form-group">
        <label for="title">
            Title:
        </label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter name of recipe...">
    </div>
    <div class="form-group">
        <label for="picture">
            Upload Image of Recipe:
        </label>
        <input type="file" class="form-control-file" name="title" id="title">
    </div>
    <div class="form-group">
        <label for="directions">
            Directions:
        </label>
        <textarea class="form-control" name="directions" id="directions" rows="5" cols="30" placeholder="Enter directions..."></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-warning" value="Add Recipe">
    </div>

</form>
@endsection