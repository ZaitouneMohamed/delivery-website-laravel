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
        <form method="POST" action="{{route('categorie.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">title :</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">image :</label>
                <input type="file" name="image" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">active :</label>
                yes : <input type="radio"  value="yes" name="active" checked>
                no : <input type="radio" value="no" name="active">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">description :</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
@endsection
