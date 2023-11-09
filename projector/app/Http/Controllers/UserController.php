<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\SendOtpMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\SendResetLinkEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{

    //
    public function login(){
        return view("auth.login");
    }
    
    public function register(){
        return view("auth.register");
    }

    public function regOTP(){
        return view("auth.verify-2fa");
    }
    public function logOTP(){
        return view("auth.logOTP");

    }
    public function showForgotPasswordForm(){
        return view('auth.forgot_password');
    }

    public function showResetPasswordForm($token){
        return view('auth.reset_password', ['token' => $token]);
    }

    public function showemailwassent(){
       return view("auth.emailsent");
    }

    //Registration Process
    //Register Users/ create a new user
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

         // Hash Password
         $formFields['password'] = bcrypt($formFields['password']);
     
         
         // Generate OTP
         $otp = rand(100000, 999999);
     
         // Store user details and OTP in session for OTP verification
         session([
             'user_details' => $formFields, 
             'otp_code' => $otp, 
             'email' => $formFields['email'], 
             'otp_created_at' => now()
         ]);
     
         // Send OTP to user's email
         Mail::to($formFields['email'])->send(new SendOtpMail($otp));
     
         // Redirect to OTP verification page
         return redirect('/verify-registration-otp');
     }

     public function verifyRegistrationOtp(Request $request)
     {
         $request->validate([
             'otp' => 'required|numeric',
         ]);
     
         $email = session('email');
         $otp_code = session('otp_code');
         $userDetails = session('user_details');
         $otp_created_at = session('otp_created_at');
     
         if ($userDetails && $request->otp == $otp_code) {
             // OTP is valid, complete the registration process
             if (Carbon::parse($otp_created_at)->addMinutes(2)->isPast()) {
                 return redirect('/verify-registration-otp')->with('error', 'OTP has expired. Please resend.');
             }
     
             else{
     
                  // Create User
             $user = User::create($userDetails);
     
             // Clear the OTP code
             $user->otp_code = null;
             $user->save();
     
             // Log the user in
             auth()->login($user);
     
             // Clear the user details and OTP code from the session
             $request->session()->forget(['email', 'otp_code', 'user_details']);
     
             return redirect('/')->with('message', 'Registration successful!');
             }
            
         } else {
             // OTP is invalid, redirect back with an error message
             return redirect('/verify-registration-otp')->with('error', 'Invalid OTP.');
         }
     }
    
     //Log Out
     public function logout(Request $request)
     {
         // Check if the user is authenticated
        
     
         // Perform the regular logout actions
         auth()->logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
     
         return redirect('/')->with('message', 'You have been logged out!');
     }
      
 
    //Authenticate ---------------------------------------------------------------------
   public function authenticate(Request $request) {
    $formFields = $request->validate([
        'email' => ['required', 'email'],
        'password' => 'required'
    ]);

    // Retrieve the user instance directly from the database
    $user = User::where('email', $formFields['email'])->first();

    // Check if the user exists and the password is correct
    if ($user && Hash::check($formFields['password'], $user->password)) {
        // Generate OTP
        $otp = rand(100000, 999999);
        $user->otp_code = $otp;
        $user->otp_created_at = now();
        $user->save();

        // Store email in session for OTP verification
        session(['email' => $formFields['email']]);

        // Send OTP to user's email
        Mail::to($user->email)->send(new SendOtpMail($otp));

        // Redirect to OTP verification page
        return redirect('/verify-login-otp');
    } else {
        return redirect('/login')->with('error', 'Wrong credentials!!')->with('showResetLink', true);
    }
}

public function verifyLoginOtp(Request $request)
{
    $request->validate([
        'otp' => 'required|numeric',
    ]);

    $email = session('email');
    $user = User::where('email', $email)->first();

    if ($user && $request->otp == $user->otp_code) {
        // OTP is valid, complete the login process

        //Check if 2 mins
        if (Carbon::parse($user->otp_created_at)->addMinutes(2)->isPast()) {
            return redirect('/verify-login-otp')->with('error', 'OTP has expired. Please resend.');
        }
        else{ 
            $user->otp_code = null; // Clear the OTP code
            $user->save();
    
            // Log the user in
            auth()->login($user);
    
            // Clear the email from the session
            $request->session()->forget('email');
    
            return redirect('/')->with('message', 'You are now logged in!');}
       
    } else {
        // OTP is invalid, redirect back with an error message
        return redirect('/verify-login-otp')->with('error', 'Invalid OTP.');
    }
}

//Resend OTP
public function resendOtp()
{
$email = session('email');
$user = User::where('email', $email)->first();

if ($user) {
    // Generate a new OTP and store the generation time
    $otp = rand(100000, 999999);
    $user->otp_code = $otp;
    $user->otp_created_at = now();
    $user->save();

    // Send the new OTP to the user's email
    Mail::to($user->email)->send(new SendOtpMail($otp));

    return redirect('/verify-login-otp')->with('message', 'A new OTP has been sent to your email.');
} else {
    return redirect('/verify-login-otp')->with('error', 'Error resending OTP. Please try again.');
}
}


//Resend Reg Otp
public function resendRegOtp()
{
$email = session('email');
$userDetails = session('user_details');

if ($userDetails) {
    // Generate a new OTP and store the generation time
    $otp = rand(100000, 999999);

    // Update the OTP and OTP creation time in the session
    session(['otp_code' => $otp, 'otp_created_at' => now()]);

    // Send the new OTP to the user's email
    Mail::to($email)->send(new SendOtpMail($otp));

    return redirect('/verify-registration-otp')->with('message', 'A new OTP has been sent to your email.');
} else {
    return redirect('/verify-registration-otp')->with('error', 'Error resending OTP. Please try again.');
}
}





}

