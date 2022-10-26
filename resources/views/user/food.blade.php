@extends('user.layout.layout')

@section('main')
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
@endif
@if (session('message'))
    <div class="alert alert-succecr" role="alert">
        {{ session('message') }}
    </div>
@endif
{{-- <div class="container text-center">
    <div class="row row-cols-3">

                @foreach ($foods as $categorie)
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="/foods/{{$categorie->image}}" class="card-img-top" alt="..." height="250px">
                            <div class="card-body">
                                <h5 class="card-title">{{$categorie->title}}</h5>
                                <p class="card-text">{{$categorie->description}}</p>
                                @if (auth()->check())
                                    @if (auth()->user()->is_admin == 0)
                                        <a href="{{route('new_order',$categorie->id)}}" class="btn btn-primary">order now</a>
                                    @endif
                                @else
                                    <a href="{{route('new_order',$categorie->id)}}" class="btn btn-primary">order now</a>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach

    </div>
</div> --}}
@include('user.sections.all_food')
@endsection
