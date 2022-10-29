<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <h1>livreurs list</h1>

    <table  class="table table-dark table-hover ">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">adresse</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livreurs as $livreur)
                <tr>
                    <td>{{ $livreur->name }}</td>
                    <td>{{ $livreur->email }}</td>
                    <td>{{ $livreur->phone }}</td>
                    <td>{{ $livreur->adresse }}</td>
                    <td> 
                        <a href="{{ route('manage_livreurs.show',$livreur->id) }}" class="btn btn-primary">show</a>
                        <form action="{{ route('manage_livreurs.destroy',$livreur->id) }}" method="post">
                            @csrf
                            @method('Delete')
                            <input type="submit" value="delete" class="btn btn-danger">
                        </form> 
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="container">
        {{$livreurs->links()}}
    </div>
</div>
