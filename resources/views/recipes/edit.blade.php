@extends ('layout')

@section('title')
Edit Recipe
@endsection
@section('content')
@include('partials.errors')
<form method="post" action="{{route('recipes.update', $recipe->id)}}">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="message">
            Edit Recipe:
            <textarea class="form-control" name="message" rows="5" cols="30">{{$recipe->message}}</textarea>
        </label>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-warning" value="Update Recipe">
    </div>
</form>
@endsection