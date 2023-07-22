@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-end mb-2">
                    <a href="{{ route('people.create') }}" class="btn btn-success">Add people</a>
                </div>

                <div class="card">
                    <div class="card-header">Add people</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">detail</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($people as $person)
                                    <tr>
                                        <th scope="row">{{ $person ->id }}</th>
                                        <td>{{ $person ->name}}</td>
                                        <td>{{ $person ->email}}</td>
                                        <td>
                                            <form action="{{route('people.destroy',['person' => $person -> id])}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">delete</button>
                                            </form>
                                        </td>

                                        <td>
                                            <a class="btn btn-warning " href="{{route('people.show',['person' => $person -> id ])}}">detail</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
