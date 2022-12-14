<div class="container">
    <center>
        <div class="card" style="width: 18rem;">
            <img src="/categories/{{ $categorie->image }}" class="card-img-top" alt="...">
            <h5 class="card-title">{{ $categorie->title }}</h5>
            <div class="card-body">
                <h4 class="">{{ $categorie->description }}</h4>
                @if ($categorie->active == 'yes')
                    <h4><button class="btn btn-success">active</button></h4>
                @else
                    <h4><button class="btn btn-danger">active</button></h4>
                @endif
                <div class="d-flex">
                    <a href="{{ route('categorie.edit', $categorie->id) }}" class="btn btn-primary">update</a>
                    <form action="{{ route('categorie.destroy', $categorie->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </center>
</div>
