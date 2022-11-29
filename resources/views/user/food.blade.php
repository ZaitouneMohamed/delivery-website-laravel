@extends('user.layout.layout')


@if ($foods->count()==0)
    @section('style')
        <style>
            #div {
                height: calc(100vh - 140px)
            }
        </style>
    @endsection
@endif

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

@include('user.sections.all_food')


@endsection
