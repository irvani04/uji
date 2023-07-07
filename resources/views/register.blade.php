
@extends('layout/layout-common')

@section('space-work')

    <h1><center>Register</center></h1>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <p style="color:red;">{{ $error }}</p>    
        @endforeach
    @endif
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
              <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                    <form action="{{ route('studentRegister') }}" method="POST">
                        @csrf
<div>                       
    <br><input type="text" name ="name" placeholder="Name" />
</div>

                        <br>Adress : <input type="text" name ="address" placeholder="Enter Address"></br>
                        <br>Gender : </br>
                        <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
                        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br>
                        <br>Phone number : <input type="text" name ="name" placeholder="Enter phone number"></br>
                        <br>Email : <input type="email" name ="email" placeholder="Enter Email"></br>
                        <br>Password : <input type="password" name ="password" placeholder="Enter Password"></br>
                        <br>Confrim Password : <input type="password" name ="password_confirmation" placeholder="Enter Confirm Password"></br>
                        <br>
                        <input type="submit" value="Register">
                        <br><br>
                    </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
    @if (Session::has('success'))
        <p style="color:green;">{{ Session::get('success') }}</p>
        
    @endif
@endsection