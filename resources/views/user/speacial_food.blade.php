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

    <div class="container text-center">
        <div class="row row-cols-3">
            @foreach ($foods as $item)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="/foods/{{ $item->image }}" class="card-img-top" alt="..." width="100%" height="250px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            @if (auth()->check())
                                    @if (auth()->user()->is_admin == 0)
                                        <a href="{{route('add_order.show',$item->id)}}" class="btn btn-primary">order now</a>
                                    @endif
                                @else
                                    <a href="{{route('add_order.show',$item->id)}}" class="btn btn-primary">order now</a>  
                                @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
