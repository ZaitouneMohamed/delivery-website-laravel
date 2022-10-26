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
    {{-- <div class="container ">
        <h1 class="text-center text-uppercase">Food Order Card</h1>
        <br>
        <br>
                    <div class="d-flex justify-content-center">
                <div class="card ">
                    <form action="{{route('add_order.store')}}" method="post">
                        @csrf
                        <div class="card flex justify-content-center" style="width: 18rem;">
                            <input type="hidden" name="id" value="{{$food->id}}">
                            <img class="card-img-top" src="/foods/{{$food->image}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{$food->title}}</h5>
                                <h3 class="card-title text-center">{{$food->price}}$</h3>
                                <p class="card-text text-center">{{$food->description}}</p>
                                <div class="container flex">
                                    <p class="btn btn-success" id="add" onclick="add()">+</p>
                                    <input type="number" name="qty" id="qty" value="1">
                                    <p class="btn btn-danger" id="n9ss" onclick="n9ss()">-</p>
                                </div>
                                @if (auth()->user()->adresse=="")
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="adresse"></textarea>
                                        <label for="floatingTextarea">adresse</label>
                                    </div><br>
                                    <input type="text" name="phone" id="" placeholder="phone" class="form-control">
                                @endif
                                <input type="submit" value="submit" class="btn btn-primary d-flex justify-content-center" >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div> --}}
    @include('user.sections.order')

@endsection


@section('js')
    <script>
        add_btn=document.getElementById('add')
        a=1;
        function add(){
            a++
            document.getElementById('qty').value=a;
        }
        function n9ss(){
            if(a==1){
                document.getElementById('qty')=1;
            }
                a--;
                document.getElementById('qty').value=a;
        }
    </script>
@endsection

