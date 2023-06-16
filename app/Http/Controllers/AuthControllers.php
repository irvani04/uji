<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthControllers extends Controller
{
    
    public function loadRegister()
    {
        if(Auth::user() && Auth::user()->is_admin == 1){
            return redirect('/admin/dashboard');
        }
        else if(Auth::user() && Auth::user()->is_admin == 0){
            return redirect('/dashboard');
        }
        return view('register');
    }

    public function studentRegister(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' => 'string|required|confirmed|min:8'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success','Your Registration has been succefull.');
    }

    public function loadLogin()
    {
        if(Auth::user() && Auth::user()->is_admin == 1){
            return redirect('/admin/dashboard');
        }
        else if(Auth::user() && Auth::user()->is_admin == 0){
            return redirect('/dashboard');
        }
        return view('login');
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'email'=> 'string|required|email',
            'password'=> 'string|required'
        ]);

        $userCredential = $request->only('email','password');
        if(Auth::attempt($userCredential)){
            
            if(Auth::user()->is_admin == 1){
                return redirect('/admin/dashboard');
            }
            else{
                return redirect('/dashboard');
            }


        }
        else {
            return back()->with('error','Username & Password is incorrect');
        }
    }

    public function loadDashboard()
    {
        $exams = Exam::with('subjects')->orderBy('date')->get();
        return view('student.dashboard',['exams' =>$exams]);
    }

    public function adminDashboard()
    {
        $subjects = Subject::all();
        return view('admin.dashboard',compact('subjects'));
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }

    public function forgetPasswordLoad()
    {
        return view('forget-password');
    }

    public function forgetPassword(Request $request)
    {
        try{

           $user = User::where('email',$request->email)->get();

           if(count($user) > 0){

                $token = Str::random(40);
                $domain = URL::to('/');
                $url = $domain.'/reset-password?token='.$token;

                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = 'Password Reset';
                $data['body'] = 'Please click on below link to reset your password';

                Mail::send('forgetPasswordMail',['data'=>$data],function($message) use ($data){
                    $message->to($data['email'])->subject($data['title']);
                });

                $dateTime = Carbon::now()->format('Y-m-d H:i:s');

                PasswordReset::updateOrCreate(
                    ['email' =>$request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => $dateTime
                    ]
                    );

                    return back()->with('success','Please check yout mail to reset your password!');

           }
           else{
            return back()->with('error','Email is not exist!');
           }

        }catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    public function resetPasswordLoad(Request $request)
    {
        $token = isset($_GET['token']) ? $_GET['token'] : '';
        $resetData = PasswordReset::where('token',$token)->get();

        if(isset($token) && $resetData->count() > 0){

            $user = User::where('email',$resetData->first()->email)->get();

            return view('resetPassword',compact('user'));
        
        }
        else{
            return view('404');
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::where('id',$request->id);
        // $user->password = Hash::make($request->password);
        // $user->save();

        if($user->count() > 0){
            $update = $user->update(['password'=>Hash::make($request->password)]);
            if($update){
                PasswordReset::where('email',$user->first()->email)->delete();

                return "<h2>Your password has been reset successfully.</h2>";
            }
        }
    
    }

}
