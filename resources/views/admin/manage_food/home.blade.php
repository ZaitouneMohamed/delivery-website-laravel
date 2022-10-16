@extends('adminlte::page')

@section('content')
<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif


    <table  class="table table-dark table-hover ">
        <thead>
            <tr>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">image</th>
                <th scope="col">price</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($foods as $food)
                <tr>
                    <td>{{ $food->title }}</td>
                    <td>{{ $food->description }}</td>
                    <td> <img src="/foods/{{ $food->image }}" alt="" width="50px" height="50px"></td>
                    <td>{{ $food->price }}$</td>
                    <td><a href="{{ route('food.show',$food->id) }}" class="btn btn-primary" >show</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="container">
        {{$foods->links()}}
    </div>
</div>
@endsection
