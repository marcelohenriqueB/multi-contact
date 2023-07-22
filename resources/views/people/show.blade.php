@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">detail of the person</div>

                    <div class="card-body">
                        <p>
                            name : {{ $person->name }}
                        </p>

                        <p>
                            email : <a href="mailto:{{ $person->email }}"> {{ $person->email }}</a>
                        </p>

                        <p>
                            created : {{ $person->created_at }}
                        </p>

                        <p>
                            updated : {{ $person->updated_at }}
                        </p>

                        <a class="btn btn-warning" href="{{ route('people.edit', ['person' => $person->id]) }}">Edit</a>

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
                                <th scope="col">Number</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($person->contacts as $contact)
                                <tr>
                                    <th scope="row">{{ $contact->id }}</th>
                                    <td>{{ $contact->country_code }}</td>
                                    <th>
                                        {{ $contact->number }}
                                    </th>
                                    <td>
                                        <form
                                            action="{{ route('contacts.destroy', ['person' => $person->id, 'contact' => $contact->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete?')"
                                                class="btn btn-danger">delete</button>
                                        </form>
                                    </td>
                                    <th scope="col">
                                        <a class=" btn btn-warning"
                                            href="{{ route('contacts.edit', ['person' => $person->id, 'contact' => $contact->id]) }}">edit</a>
                                    </th>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <a class="ms-2 mb-2 " href="{{ route('contacts.create', ['person' => $person->id]) }}">
                        Add contact
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
