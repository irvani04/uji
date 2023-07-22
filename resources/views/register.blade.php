
@extends('layout/layout-common')

@section('space-work')

    

    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <p style="color:red;">{{ $error }}</p>    
        @endforeach
    @endif
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-9 col-xl-7 align-items-center">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px; align-items-center">
              <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"><center>Registration Form</center></h3>
                    <form action="{{ route('studentRegister') }}" method="POST" >
                        @csrf
<div>                       
    <br> <label>Name : </label>
    <input type="text" name ="name" placeholder="Name" />
</div>

                      <div>
                        <br>
                          <label> Address :</label> <input type="text" name ="address" placeholder="Enter Address" />
                      </div>
                      <div>
                        <br>Gender : 
                        
                        <input type="radio" name="gender" value="Laki-laki"> Laki-laki
                        <input type="radio" name="gender" value="Perempuan"> Perempuan 
                        <br>
                      </div>
                        <div>
                        <br>Phone number : <input type="text" name ="phone" placeholder="Enter phone number" /></br>
                        </div>
                        <div>
                        <br>Email : <input type="email" name ="email" placeholder="Enter Email" /></br>
                        </div>
                        <div>
                        <br>Password : <input type="password" name ="password" placeholder="Enter Password"/>
                        </div>
                        
                        <div>
                        <br>Confrim Password : <input type="password" name ="password_confirmation" placeholder="Enter Confirm Password" />
                        </div>
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