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
                    <h5 class="card-title">{{$admin->name}}</h5>
                    <p class="card-text">{{$admin->email}}</p>
                    <a href="{{route('manage.edit',$admin->id)}}" class="btn btn-primary">change email or uname</a><br>
                    <a href="{{route('admin.change_pass',$admin->id)}}" class="btn btn-danger">change password</a>
                </div>
            </div>
        </div>
    </div>
</div>
