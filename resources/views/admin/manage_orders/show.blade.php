@extends('adminlte::page')

@section('content')
<div class="container center">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/foods/{{$order->food->image}}" class="img-fluid rounded-start" alt="...">
            </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{$order->user->adresse}}</h5><br>
                <h5 class="card-title">{{$order->food->title}}</h5><br>
                <h5 class="card-title">{{$order->qty}}</h5><br>
                @if ($order->confirmation === "nothing" || $order->confirmation === "refuse")
                    <form action="{{route('manage_order.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="order_id" value="{{$order->id}}">
                        give order to
                        <select class="form-select" aria-label="Default select example" name="livreur_id" >
                            <option selected>...</option>
                            @foreach ($livreurs as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="submit" class="btn btn-primary">
                    </form>
                @elseif ($order->confirmation=="wait for answer")
                    <p class="text">waiting for confirmation</p>
                @elseif ($order->confirmation=="accepte")
                    <p class="text">livreur accepte</p>
                @endif
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
