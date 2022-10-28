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

    @include('user.sections.home.categories')

    @include('user.sections.home.about')

    @include('user.sections.home.reviews')

@endsection

@section('js')
    <script type="text/javascript" src="{{URL::asset('js/script.js')}}"></script>
@endsection
