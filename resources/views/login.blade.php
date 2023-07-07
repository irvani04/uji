@extends('layout/layout-common')

@section('space-work')

    <h1><center>Login</center></h1>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color:red;">{{ $error }}</p>
            @endforeach
        @endif

        @if (Session::has('error'))
            <p style="color:red;">{{ Session::get('error') }}</p>
        @endif
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                  <div class="card-body p-5 text-center">
                        <form action="{{ route('userLogin') }}" method="POST">
                            @csrf

                            <input type="email" name="email" placeholder="Enter Email">
                            <br><br>
                            <input type="password" name="password" placeholder="Enter Password">
                            <br><br>
                            <input type="submit" value="Login">
                        <br>
                        <a href="/forget-password">Forget Password</a>
                        <br>
                        <p>Don't have account ? <a href="/register"> Sign Up</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
