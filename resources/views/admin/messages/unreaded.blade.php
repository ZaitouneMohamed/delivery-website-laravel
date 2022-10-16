@extends('adminlte::page')

@section('content')
<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if ($count==0)
        <h1 class="text-center">makaynch ljadid</h1>
    @else
    <h1 class="text-center">unreaded messages({{$count}})</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">content</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $item)
                <tr>
                    <th scope="row">{{$item->name}}</th>
                    <th scope="row">{{$item->email}}</th>
                    <th scope="row">{{$item->content}}</th>
                    <th scope="row">
                        <a href="{{route('read_message',$item->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                    </th>
                </tr>
            @endforeach

        </tbody>
    </table>
    @endif
    <div class="container">
        {{$messages->links()}}
    </div>

</div>
@endsection
