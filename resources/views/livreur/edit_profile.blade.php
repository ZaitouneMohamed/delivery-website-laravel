@extends('livreur.layout.layout')

@section('main')
<div class="container d-flex justify-content-center">
    <form action="{{route('profile.update',$profile->id)}}" method="post">
        @csrf
        @method("put")
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" value="{{$profile->name}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" value="{{$profile->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">phone</label>
            <input type="text" name="phone" value="{{$profile->phone}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">adresse</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="adresse" placeholder="adresse">{{$profile->adresse}}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
