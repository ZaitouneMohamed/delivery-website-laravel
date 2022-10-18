@extends('user.layout.layout')

@section('main')
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
@endif
@if (session('message'))
    <div class="alert alert-danger" role="alert">
        {{session('message')}}
    </div>
@endif
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
            <img src="/categories/{{$categorie1->image}}" class="d-block w-100" alt="..." height="500px">
            <div class="carousel-caption d-none d-md-block">
                <h5>{{$categorie1->title}}</h5>
                <p>{{$categorie1->description}}</p>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="/categories/{{$categorie2->image}}" class="d-block w-100" alt="..." height="500px">
            <div class="carousel-caption d-none d-md-block">
                <h5>{{$categorie2->title}}</h5>
                <p>{{$categorie2->description}}</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/categories/{{$categorie3->image}}" class="d-block w-100" alt="..." height="500px">
            <div class="carousel-caption d-none d-md-block">
                <h5>{{$categorie3->title}}</h5>
                <p>{{$categorie3->description}}</p>
            </div>
       </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
<br><br><br>
<div class="container text-center">
    <h1>Our Categorie</h1>
    <div class="row">
        @foreach ($categories as $item)
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="categories/{{$item->image}}" class="card-img-top" alt="..." width="100%" height="250px">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <a href="{{route('user.spacial_food',$item->id)}}" class="btn btn-primary">see food of this categorie</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br>
    <a href="{{route('user.categories')}}" class="btn btn-primary">see all categories</a>
</div>
<br><br><br><br>
<div class="container text-center">
    <h1>our best food</h1>
    <div class="row">
        @foreach ($categories as $item)
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="categories/{{$item->image}}" class="card-img-top" alt="..." width="100%" height="250px">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <a href="{{route('user.spacial_food',$item->id)}}" class="btn btn-primary">see food of this categorie</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br>
    <a href="{{route('user.categories')}}" class="btn btn-primary">see all categories</a>
</div>


<div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">Slide 1</div>
      <div class="swiper-slide">Slide 2</div>
      <div class="swiper-slide">Slide 3</div>
      <div class="swiper-slide">Slide 4</div>
      <div class="swiper-slide">Slide 5</div>
      <div class="swiper-slide">Slide 6</div>
      <div class="swiper-slide">Slide 7</div>
      <div class="swiper-slide">Slide 8</div>
      <div class="swiper-slide">Slide 9</div>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

@endsection


@section('js')

<script>
    var swiper = new Swiper(".mySwiper", {});
</script>
@endsection
