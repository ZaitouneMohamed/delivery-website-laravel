@extends('livreur.layout.layout')

@section('main')
<div class="container">
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">food</th>
                <th scope="col">price</th>
                <th scope="col">qty</th>
                <th scope="col">total</th>
                <th scope="col">adresse</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $item)
                <tr>
                    <td>{{$item->food->title}}</td>
                    <td><img src="/foods/{{$item->food->image}}" alt="" width="50px" height="50px"></td>
                    <td>{{$item->food->price}}$</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->total}}$</td>
                    <td>{{$item->user->adresse}}</td>
                    {{-- <td>{{ $item->user->name }}</td> --}}
                    {{-- <td><button class="btn btn-primary"><i class="fas fa-eye"></i></button></td> --}}
                    {{-- <td><a class="btn btn-primary" href="{{route('orders.show',$item->id)}}"><i class="fas fa-eye"></i></a></td> --}}
                    <td><a class="btn btn-primary" href="{{route('orders.show',$item->id)}}">show order</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container">
        {{$orders->links()}}
    </div>
</div>
@endsection
