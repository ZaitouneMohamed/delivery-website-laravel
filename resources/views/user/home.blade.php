@extends('user.layout.layout')

@section('main')
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
@endif
@if (session('message'))
    <div class="alert alert-danger" role="alert">
        {{session('message')}}
    </div>
@endif
@include('user.sections.home.header')
<!-- Background image -->
@include('user.sections.home.categories')

@include('user.sections.home.about')

@include('user.sections.home.reviews')

{{-- <br><br><br><br>
<div class="container text-center">
    <h1>our best food</h1>
    <div class="row">
        @foreach ($categories as $item)
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="categories/{{$item->image}}" class="card-img-top" alt="..." width="100%" height="250px">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <a href="{{route('user.spacial_food',$item->id)}}" class="btn btn-primary">see food of this categorie</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br>
    <a href="{{route('user.categories')}}" class="btn btn-primary">see all categories</a>
</div>
 --}}

@endsection

