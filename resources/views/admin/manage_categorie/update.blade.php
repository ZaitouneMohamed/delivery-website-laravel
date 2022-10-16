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
        <h3><i>update {{$categorie->title}}</i></h3>
        <form method="POST" action="{{route('categorie.update' , $categorie->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">title :</label>
                    <input type="text" class="form-control" name="title" value="{{$categorie->title}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">image :</label>
                    <input type="file" class="form-control" name="image" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">feautured :</label>
                    @if ($categorie->feautured=="yes")
                        yes : <input type="radio"  value="yes" name="feautured" checked>
                        No : <input type="radio"  value="no" name="feautured">
                    @else
                        yes : <input type="radio"  value="yes" name="feautured" >
                        No : <input type="radio"  value="no" name="feautured" checked>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">active :</label>
                    @if ($categorie->active=="yes")
                        yes : <input type="radio"  value="yes" name="active" checked>
                        No : <input type="radio"  value="no" name="active">
                    @else
                        yes : <input type="radio"  value="yes" name="active" >
                        No : <input type="radio"  value="no" name="active" checked>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">description :</label>
                    <textarea name="description" class="form-control" rows="3">{{$categorie->description}}</textarea>
                </div>
                <input type="submit" value="update" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
