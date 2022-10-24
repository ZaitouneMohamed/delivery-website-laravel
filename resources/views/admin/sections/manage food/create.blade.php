<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{route('food.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">title :</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">description :</label>
            <textarea class="form-control" name="description" cols="10" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">price :</label>
            <input type="number" class="form-control" name="price">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">image :</label>
            <input type="file" class="form-control" name="image" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">categorie :</label>
            <select name="categorie" id="">
                @foreach ($categorie as $item)
                    <option value="{{$item->id}}">{{$item->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">active :</label>
            yes : <input type="radio"  value="yes" name="active" checked>
            no : <input type="radio" value="no" name="active">
        </div>

        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
