@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Add people</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
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


                    <form action="{{route('people.store')}}" method="post">
                        @csrf
                        <div>
                            <label for="name">Name</label>
                            <input type="text" name="name"  id="name" class="form-control" value="{{old('name')}}">                            
                        </div>
                        <div class="mt-2" >
                            <label for="email">Email address </label>
                            <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
                        </div>
                        
                        <button class="btn btn-success mt-3">Create</button>
                    </form>

                    
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
