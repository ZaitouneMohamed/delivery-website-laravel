@extends('user.layout.layout')

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
<div class="container text-center">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{route('send_message')}}" method="post">
            @csrf
            @method('post')
            <center>
                <h1 class="center">send us a message</h1>
                @if (!auth()->check())
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="name" placeholder="name@example.com">
                        <label for="floatingInput">name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="phone" placeholder="name@example.com">
                        <label for="floatingInput">phone</label>
                    </div>
                @endif
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="floatingTextarea" style="height: 100px" name="content" placeholder="name@example.com"></textarea>
                        <label for="exampleFormControlTextarea1" class="form-label">leave us a message</label>
                    </div>
            </center>
            <input type="submit" value="send" class="btn btn-primary">
        </form>
</div>

@endsection
