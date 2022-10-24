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
