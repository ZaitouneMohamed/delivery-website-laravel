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
    <div class="container ">
        <h1 class="text-center text-uppercase">Food Order Card</h1>
        <br>
        <br>
        {{-- <div class="row"> --}}
            {{-- <div class="col-sm-6 col-md-6 col-lg-4"> --}}

                    {{-- @method('post') --}}
                <div class="card justify-content-center">
                    <form action="{{route('add_order.update',$order->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="card flex justify-content-center" style="width: 18rem;">
                            <input type="hidden" name="food_id" value="{{$order->food_id}}">
                            <img class="card-img-top" src="/foods/{{$order->food->image}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{$order->food->title}}</h5>
                                <h3 class="card-title text-center">{{$order->food->price}}$</h3>
                                <p class="card-text text-center">{{$order->food->description}}</p>
                                <div class="container flex">
                                    <p class="btn btn-success" id="add" onclick="add()">+</p>
                                    <input type="text" name="qty" id="qty" value="{{$order->qty}}">
                                    <p class="btn btn-danger" id="n9ss" onclick="n9ss()">-</p>
                                </div>
                                <input type="submit" value="submit" class="btn btn-primary d-flex justify-content-center" >
                            </div>
                        </div>
                    </form>
                </div>
            {{-- </div> --}}
        {{-- </div> --}}
    </div>

@endsection
@section('js')
    <script>
        add_btn=document.getElementById('add')
        a=document.getElementById('qty').value;
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

