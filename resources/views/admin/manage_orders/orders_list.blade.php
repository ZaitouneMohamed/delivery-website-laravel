@extends('adminlte::page')

@section('plugins.Datatables',true)

@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <h1>all orders</h1>

        <table class="table table-dark table-hover" id="mytable">
            <thead>
                <tr>
                    <th scope="col">title</th>
                    <th scope="col">food</th>
                    <th scope="col">image</th>
                    <th scope="col">price</th>
                    <th scope="col">adresse</th>
                    <th scope="col">status</th>
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
                            @if ($food->confirmation == 'nothing')
                                not yet
                            @elseif($food->confirmation == 'wait for answer')
                                waiting for answer
                            @elseif ($food->confirmation == 'accepte')
                                livreur accepte
                            @elseif ($food->confirmation == 'refuse')
                                livreur refuse
                            @elseif ($food->confirmation == 'returned')
                                livreur return order
                            @endif
                        </td>
                        <td class="d-flex ">
                            <a href="{{ route('manage_order.show', $food->id) }}" class="btn btn-success"><i
                                    class="fas fa-eye"></i></a><br>
                            <form action="{{ route('manage_order.destroy', $food->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="container">
            {{ $orders->links() }}
        </div> --}}
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#mytable').DataTable({
                dom : 'Bfrtip',
                buttons : [
                    'copy','excel','pdf','csv','print','colvis',
                ]
            })
        });
    </script>
@endsection
