@extends('adminlte::page')

@section('content')
    <div class="container">
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <form method="POST" action="{{route('admin.pass',$admin->id)}}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password1" id="pass1">
                <p id="p1" style="color: red"></p>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Repeat Password</label>
                <input type="password" class="form-control" name="password2" id="pass2">
                <p id="p" style="color: red"></p>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary" disabled id="btn">
        </form>
    </div>
@endsection

@section('js')
    <script>
        pass2=document.getElementById('pass2');
        pass1=document.getElementById('pass1');
        // var exppass= /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/
        pass1.oninput=function f1(){
            // if(!pass1.value.match(exppass)){
                // pass=pass1.value;
            if(pass1.value.length <= 7){
                document.getElementById('p1').innerHTML='your password should be at leats 8 carachter'
                document.getElementById('p1').style.color='red'
            }
            else{
                document.getElementById('p1').innerHTML='all good'
                document.getElementById('p1').style.color='green'
            }
        }

        pass2.oninput=function f2(){
            pass1=document.getElementById('pass1').value;
            pass2=document.getElementById('pass2').value;
            p=document.getElementById('p')
            btn=document.getElementById('btn')
            if(pass1 != pass2){
                p.innerHTML= 'passwrord not match'
                p.style.color="red"
                btn.disabled=true;
            }
            else{
                p.style.color="green"
                p.innerHTML='all good'
                btn.disabled=false;
            }

        }
    </script>
@endsection
