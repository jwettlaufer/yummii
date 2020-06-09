<form action="{{route('search')}}" method="post" role="search">
@csrf
    <div class="input-group">
        <input type="search" class="form-control" name="q"
            placeholder="Search recipes"> <span class="input-group-btn">
            <span class="input-group-prepend">
            <button type="submit" class="btn btn-primary">
                Search
            </button>
        </span>
    </div>
</form>