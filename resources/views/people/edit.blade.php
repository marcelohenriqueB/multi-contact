@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Add people</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif


                    <form action="{{route('people.update',['person' => $person -> id])}}" method="post">
                        @method('PUT')
                        @csrf
                        <div>
                            <label for="name">Name</label>
                            <input type="text" name="name"  id="name" class="form-control" value="{{$person -> name}}" >                            
                        </div>
                        <div class="mt-2" >
                            <label for="email">Email address </label>
                            <input type="email" name="email" id="email" class="form-control" value="{{$person -> email}}">
                        </div>
                        
                        <button class="btn btn-success mt-3">edit</button>
                    </form>
                    
                   
                </div>

                
            </div>
            <a href="{{route('people.index')}}" class="btn btn-secondary btn-sm mt-2"> Back </a>
        </div>
    </div>
</div>
@endsection
