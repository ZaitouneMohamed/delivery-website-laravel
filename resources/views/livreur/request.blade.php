@extends('livreur.layout.layout')

@section('main')
<div class="container">
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif

    <h1>orders request</h1>
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
                    <td>
                        <a class="btn btn-primary" href="{{route('livreur_accepte_request',$item->id)}}">accepte</a>
                        <a class="btn btn-danger" href="{{route('livreur_refuse_order',$item->id)}}">refuse</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
