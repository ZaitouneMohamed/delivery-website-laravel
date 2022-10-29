@extends('adminlte::page')

@section('content')
<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <h1>tacked orders</h1>

    @if ($orders->count()==0)
        no tacked orders
    @else

    <table  class="table table-dark table-hover ">
        <thead>
            <tr>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">image</th>
                <th scope="col">price</th>
                <th scope="col">adresse</th>
                <th scope="col">livreur</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $food)
                <tr>
                    <td>{{ $food->user->name }}</td>
                    <td>{{ $food->food->title }}</td>
                    <td> <img src="/foods/{{ $food->food->image }}" alt="" width="50px" height="50px"></td>
                    <td>{{ $food->food->price }}$</td>
                    <td>{{ $food->user->adresse }}</td>
                    <td>
                        @if ($food->confirmation == "nothing")
                            not yet
                        @elseif($food->confirmation == "wait for answer")
                            waiting for answer
                        @elseif ($food->confirmation == "accepte")
                            livreur accepte
                        @elseif ($food->confirmation == "refuse")
                            livreur refuse
                        @elseif ($food->confirmation == "returned")
                            livreur return order
                        @endif
                    </td>
                    <td class="d-flex ">
                        <a href="{{route('manage_order.show',$food->id)}}" class="btn btn-success"><i class="fas fa-eye"></i></a><br>
                        <form action="{{route('manage_order.destroy',$food->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            {{-- <input type="submit" value="delete" class="btn btn-danger"> --}}
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    
    <div class="container">
        {{$orders->links()}}
    </div>
</div>
@endsection
