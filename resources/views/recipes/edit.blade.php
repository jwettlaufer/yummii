@extends ('layout')

@section('title')
Edit Recipe
@endsection
@section('content')
@include('partials.errors')
<div id="app">
    <form method="post" enctype="multipart/form-data" action="{{route('recipes.update', $recipe->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">
                Title:
            </label>
            <input type="text" class="form-control" name="title" value="{{$recipe->title}}">
        </div>
        <div class="form-group">
            <label for="picture">
                Upload Image of Recipe:
            </label>
            <input type="file" class="form-control-file" name="picture" accept="image/*" onchange="readURL(this)">
        </div>
        <div class="form-group">
            <label for="directions">
                Directions:
            </label>
            <textarea class="form-control" name="directions" rows="5" cols="30">{{$recipe->directions}}</textarea>
        </div>
        <select-ingredients>
        </select-ingredients>
        <select-categories>
        </select-categories>
        <div class="form-group">
            <input type="submit" class="btn btn-warning" value="Edit Recipe">
        </div>
    </form>
</div>
@endsection