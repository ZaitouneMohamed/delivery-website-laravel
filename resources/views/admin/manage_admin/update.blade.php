@extends('adminlte::page')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('manage.update',$admin->id)}}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">name :</label>
                <input type="text" class="form-control" name="name" value="{{ $admin->name }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">email :</label>
                <input type="text" class="form-control" name="email" value="{{ $admin->email }}">
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
@endsection
