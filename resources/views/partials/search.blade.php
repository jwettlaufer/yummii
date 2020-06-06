<form action="{{route('search')}}" method="post" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q" placeholder="Search recipes"> <span class="input-group-btn">
            <button type="submit" class="btn btn-warning">
                Search
            </button>
        </span>
    </div>
</form>