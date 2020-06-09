@extends ('layout')

@section('title')
Edit Profile
@endsection
@section('content')
@include('partials.errors')
<form method="post" enctype="multipart/form-data" action="{{route('profile.update', $user->id, $profile->id)}}">
  @csrf
  @method('PATCH')
  <div class="form-group">
        <label for="picture">
            Upload Profile Pic:
        </label>
        <input type="file" class="form-control-file" name="picture" accept="image/*" onchange="readURL(this)">
    </div>
  <div class="form-group">
    <label for="name">
      <strong>Edit name:</strong>
      <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
    </label>
    <br>
    <label for="email">
      <strong>Edit email:</strong>
      <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
    </label>
    <br>
    <label for="bio">
      <strong>Edit Bio:</strong>
      <input type="text" class="form-control" name="bio" id="bio" value="{{$profile->bio}}">
    </label>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-warning" value="Update Profile">
  </div>
</form>
@endsection
