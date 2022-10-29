@extends('livreur.layout.layout')

@section('main')
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
        <center>
            <div class="card-body">
                <h5 class="card-title">{{$profile->name}}</h5>
                <p class="card-text">{{$profile->email}}</p>
                <p class="card-text">{{$profile->phone}}</p>
                <p class="card-text">{{$profile->adresse}}</p>
                <a href="{{route('profile.edit',$profile->id)}}" class="btn btn-primary">edit</a>
            </div>
        </center>
    </div>
</div>

@endsection
