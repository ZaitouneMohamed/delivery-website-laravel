@extends('adminlte::page')

@section('content')


@if ($messages->count()==0)
    <h1>nothing new</h1>
@else
    @include('admin.sections.manage message.unreaded')
@endif

@endsection
