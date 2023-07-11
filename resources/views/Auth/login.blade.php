@extends('layouts.auth-master')
@section('content')
    <div class="container">
        <div class="col-md-4 bg-muted">
            <h3 class="">Login</h3>
            <form action="{{ route('login-perform') }}" method="post">
                @csrf
                <div>
                    <input type="email" class="form-control mt-2" name="email" id=""
                        placeholder="example@gmail.com">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div>
                    <input type="password" class="form-control mt-2" name="password" id="" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="flex">
                    <a class="btn btn-lg  btn-primary mt-3 " href="{{ route('home.index') }}" type="submit">Back</a>
                    <button class="btn btn-lg  btn-primary mt-3" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
