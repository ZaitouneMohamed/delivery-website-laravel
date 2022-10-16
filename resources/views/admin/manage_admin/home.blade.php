@extends('adminlte::page')

@section('content')
<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif


    <table  class="table table-dark table-hover ">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <a href="{{ route('manage.edit',$admin->id) }}" class="btn btn-primary">update</a>
                        {{-- <a href="{{ route('manage.destroy',$admin->id) }}" data-method="delete"  data-confirm="Are you sure you want to delete this?" class="btn btn-danger">delete</a> --}}
                        <form action="{{ route('manage.destroy',$admin->id) }}" method="post">
                            @csrf
                            @method('Delete')
                            <input type="submit" value="delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
