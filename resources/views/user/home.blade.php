@extends('user.layout.layout')

@section('main')
    @if (session('error'))
        <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
            {{session('error')}}
        </div>
    @endif

    @if (session('message'))
    <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
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
