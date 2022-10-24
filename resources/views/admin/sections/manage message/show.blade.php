<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">content</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <th scope="row">{{$message->name}}</th>
                    <th scope="row">{{$message->email}}</th>
                    <th scope="row">{{$message->content}}</th>
                </tr>
        </tbody>
    </table>
</div>
