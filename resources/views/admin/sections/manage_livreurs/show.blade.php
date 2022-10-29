<div class="container">
    @if (session('message'))
        <div class="alert alert-succes" role="alert">
            {{session('message')}}
        </div>
    @endif
    <div class="row my-5 d-flex justify-content-center">
        <div class="col-md-4">
            <div class="card p-4">
                <div class="card-header">
                    <h1></h1>
                    <h5 class="card-title">{{$livreur->name}}</h5>
                    <p class="card-text">{{$livreur->email}}</p>
                    <p class="card-text">{{$livreur->phone}}</p>
                    <p class="card-text">{{$livreur->adresse}}</p>
                    <form action="{{ route('manage_livreurs.destroy',$livreur->id) }}" method="post">
                        @csrf
                        @method('Delete')
                        <input type="submit" value="delete" class="btn btn-danger">
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
