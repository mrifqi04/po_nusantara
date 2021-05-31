@extends('layouts.frontend')

@section('content')    

    <div class="container" style="padding: 13%; margin: auto;">
        <div class="row">
            <div class="col-md-12" id="login">
                <div class="card col-md-8">
                    <div class="card-body">
                        <h2 class="card-title text-dark">Login</h2>
                        <hr>
                        @if (session()->has('msg'))
                            <div class="alert alert-danger">
                                {{ session()->get('msg') }}
                            </div>
                        @endif
    
                        <form action="/store-login" method="post">
    
                            @csrf                           
    
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                            </div>
    
                            <div class="form-group mt-4">
                                <label for="password">Password:</label>
                                <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                            </div>                           
    
                            <div class="form-group mt-5">
                                <button class="btn btn-outline-info col-md-2">Sign In</button>
                                <small class="text-muted ml-3">Didn't have an account? 
                                    <a href="/register">Register</a>
                                </small>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
