@extends('layouts.frontend')

@section('content')    

    <div class="container" style="padding: 10%; margin: auto;">
        <div class="row">
            <div class="col-md-12" id="register" style="position: relative; left: 10%">
                <div class="card col-md-8">
                    <div class="card-body">
                        <h2 class="card-title text-dark">Register</h2>
                        <hr>
    
                        @if ( $errors->any() )    
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
    
                        <form action="/user/store-register" method="post" class="text-dark">
                            @csrf
                            <div class="form-group">
                                <label for="name">Fullname :</label>
                                <input type="text" name="name" placeholder="name" id="name" class="form-control">
                            </div>
    
                            <div class="form-group mt-3">
                                <label for="email">Email :</label>
                                <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                            </div>
    
                            <div class="form-group mt-3">
                                <label for="password">Password :</label>
                                <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                            </div>
    
                            <div class="form-group mt-3">
                                <label for="password_confirmation">Confirm Password :</label>
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation" class="form-control">
                            </div>

                            <div class="form-group mt-3">
                                <label for="no_telp">No Telp :</label>
                                <input type="text" name="no_telp" placeholder="No Telp" id="no_telp" class="form-control">
                            </div>
    
                            <div class="form-group mt-3">
                                <label for="alamat">Alamat :</label>
                                <textarea name="alamat" placeholder="alamat" id="alamat" class="form-control"></textarea>
                            </div>
                            
                            <div class="form-group mt-5">
                                <button class="btn btn-outline-info col-md-2">Register</button>
                                <small class="text-muted ml-3">Already have an account? 
                                    <a href="/register">Login</a>
                                </small>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
