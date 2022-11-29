@extends('livreur.layout.layout')

@section('main')
    <div class="container d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            <form action="{{ route('orders.store') }}" method="post">
                @csrf
                <img src="/foods/{{ $order->food->image }}" class="card-img-top" alt="..." width="100%" height="200px">
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $order->food->title }}</h5>
                    <p class="card-text"><b>MR : <span class="text-primary">{{ $order->user->name }}</span></b></p>
                    <p class="card-text"><b><span class="text-success">{{ $order->user->phone }}</span></b></p>
                    <p class="card-text"><b>To : <i>{{ $order->user->adresse }}</i></b></p>
                    <p class="card-text"><b>quatity : <i>{{ $order->qty }} piece</i></b></p>
                    <p class="card-text"><b>Price : <i>{{ $order->food->price }}$</i></b></p>
                    status :<select class="form-select" aria-label="Default select example">
                        <option value="received">received</option>
                    </select>
                    <input type="submit" value="submit" class="btn btn-primary">
                </div>
            </form>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@mdo">return order</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">why you want to return this order</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{route('livreur_return_order', $order->id)}}">
                            <div class="modal-body">
                                    @csrf
                                    @method('POST')
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Message:</label>
                                        <textarea class="form-control" id="message-text" name="raison"></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" value="Send" class="btn btn-primary" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
