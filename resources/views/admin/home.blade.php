@extends('adminlte::page')

@section('content')
<div class="container">
    @if (session('message'))
        <div class="alert alert-succes" role="alert">
            {{session('message')}}
        </div>
    @endif
    <div class="row my-5">
        <div class="col-md-8">
            <div class="card p-10">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="small-box bg-info m-3 w-75">
                            <div class="inner">
                                <h2>{{\App\Models\food::count()}}</h2>
                                <h2>food</h2>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{url('admin/food')}}" class="small-box-footer">
                                see more <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        <div class="small-box bg-info m-3 w-75">
                            <div class="inner">
                                <h2>{{\App\Models\categorie::count()}}</h2>
                                <h2>categorie</h2>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{url('admin/categorie')}}" class="small-box-footer">
                                see more <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        <div class="small-box bg-info m-3 w-75">
                            <div class="inner">
                                <h2>{{\App\Models\order::count()}}</h2>
                                <h2>orders</h2>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{url('admin/orders')}}" class="small-box-footer">
                                see more <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
