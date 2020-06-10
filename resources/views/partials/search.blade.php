<form action="{{route('search')}}" method="post" role="search">
    @csrf
    <div class="input-group">
        <input type="search" class="form-control" name="q" placeholder="Search by Recipe Name, Ingredient or Category..."> <span class="input-group-btn">
            <span class="input-group-prepend">
                <button type="submit" class="rouge btn">
                    <i class="fa fa-search"></i>
                </button>
            </span>
    </div>
</form>