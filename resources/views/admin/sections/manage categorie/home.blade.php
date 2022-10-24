<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

        <h1>categories ({{$categories->count()}})</h1>
    <table  class="table table-dark table-hover ">
        <thead>
            <tr>
                <th scope="col">title</th>
                <th scope="col">image</th>
                <th scope="col">active</th>
                <th scope="col">description</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categorie)
                <tr>
                    <td>{{ $categorie->title }}</td>
                    <td> <img src="/categories/{{ $categorie->image }}" alt="" width="50px" height="50px"></td>
                    <td>
                        {{-- {{ $categorie->active }} --}}
                        @if ($categorie->active=='yes')
                            <p class="btn btn-success">yes</p>
                        @else
                            <p class="btn btn-danger">No</p>
                        @endif
                    </td>
                    <td>{{ $categorie->description }}</td>
                    <td><a href="{{ route('categorie.show',$categorie->id) }}" class="btn btn-primary" >show</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>

</div>
<div class="container">
    {{$categories->links()}}
</div>
