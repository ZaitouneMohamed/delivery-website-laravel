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
    <div class="container justify-content-center">
        <h1 class="text-center text-uppercase">your orders</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">food</th>
                    {{-- <th scope="col">image</th> --}}
                    <th scope="col">price</th>
                    <th scope="col">qty</th>
                    <th scope="col">total</th>
                    <th scope="col">statue</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                    <tr>
                        <th scope="row">{{$item->food->title}} <input type="hidden" name="order_id" value="{{$item->id}}"></th>
                        <td>{{$item->food->price}}$</td>
                        <td>{{$item->qty}}</td>
                        <td>{{$item->total}}$</td>
                        <td>
                            @if ($item->status == "on load")
                                <p class="btn btn-info">{{$item->status}}</p>
                            @endif
                            @if ($item->status == "on road")
                                <p class="btn btn-primary">{{$item->status}}</p>
                            @endif
                            @if ($item->status == "received")
                                <p class="btn btn-success">{{$item->status}}</p>
                            @endif
                            @if ($item->status == "returned")
                                <p class="btn btn-danger">{{$item->status}}</p>
                            @endif
                        </td>
                        @if ($item->status == "on load")
                            <td>
                                <a href="{{route('add_order.edit',$item->id)}}" class="btn btn-primary">update</a>
                                <form action="{{route('add_order.destroy',$item->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="delete" class="btn btn-danger">
                                </form>
                            </td>
                        @endif
                        @if ($item->status == "returned")
                            <td>
                                <a href="{{route('add_order.show',$item->id)}}" class="btn btn-primary">find why</a>
                                <form action="{{route('add_order.destroy',$item->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="delete" class="btn btn-danger">
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container">
            {{$orders->links()}}
        </div>
    </div>

@endsection

