@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">detail of the person</div>

                    <div class="card-body">
                        <p>
                            name : {{ $person -> name }}
                        </p>

                        <p>
                            email : <a href="mailto:{{ $person -> email }}"> {{ $person -> email }}</a>
                        </p>

                        <p>
                            created : {{$person -> created_at}}
                        </p>

                        <p>
                            updated : {{$person -> updated_at}}
                        </p>  
                        
                        <a class="btn btn-warning" href="{{route('people.edit',['person' => $person -> id ])}}">Edit</a>

                    </div>


                    
                </div>
            </div>


            <div class="col-md-8 mt-5">
               

                <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($person -> contacts  as $contact)
                                <tr>
                                    <th scope="row">{{ $contact ->id }}</th>
                                    <td>{{ $contact -> country_code}}</td>
                                    
                                    <td>
                                        <form action="{{route('people.destroy',['person' => $person -> id])}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">delete</button>
                                        </form>
                                    </td>
                                    <th scope="col">
                                        <a class=" btn btn-warning" href="{{route('people.edit',$person -> id)}}">edit</a>
                                    </th>

                                    <td>
                                        <a class="btn btn-success " href="{{route('people.show',['person' => $person -> id ])}}">detail</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <a href="{{route('contacts.create',['person' => $person -> id])}}">
                        add contact
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
