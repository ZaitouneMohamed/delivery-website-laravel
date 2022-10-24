<div class="container">
    <center>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/foods/{{$food->image}}" class="img-fluid rounded-start" alt="...">
                    <p class="card-text">{{ $food->catgorie->title ?? 'no categorie'}}</p>
                    <div class="d-flex p-2">
                        <a class="btn btn-primary"href="{{route('food.edit',$food->id  )}}">update</a>
                        <form action="{{route('food.destroy',$food->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="delete" class="btn btn-danger">
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">{{$food->title}}</h5>
                        <p class="card-text">{{$food->description}}</p>
                        <p class="card-text">{{$food->price}}$</p>
                        @if ($food->active=="yes")
                            <h4><button class="btn btn-success">active</button></h4>
                        @else
                            <h4><button class="btn btn-danger">active</button></h4>
                        @endif
                    </div>
            </div>
        </div>
        </div>
    </center>
</div>
