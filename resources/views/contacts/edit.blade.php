@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Add contact</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ route('contacts.update',['person' => $person ->id,'contact' => $contact -> id]) }}" method="post">
                            @csrf

                            @method('put')

                            <input type="hidden" name="people_id" value="{{$person -> id}}">

                            <div>   
                                <label for="name">Country Code</label>
                                <input list="country" name="country_code" value="{{$contact ->id}}" class="form-control" id="input_country_code">
                                <datalist id="country"></datalist>
                            </div>
                            <div class="mt-2">
                                <label for="email">Number </label>
                                <input maxlength="9" minlength="9" type="text" value="{{$contact -> number }}" name="number" id="email" class="form-control" value="{{ old('number') }}">
                            </div>

                            <button class="btn btn-warning mt-3">edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
