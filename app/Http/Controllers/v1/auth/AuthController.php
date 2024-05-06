<?php

namespace App\Http\Controllers\v1\auth;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\View\View;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\v1\careepick\JobSeeker\JobSeeker;

class AuthController extends Controller
{
    private $user = [];

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function jsRegistrationPage(): view
    {
        return view('v1.careepick.pages.auth.job-seeker.registar');
    }

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function jsSigninPage(): view
    {
        return view('v1.careepick.pages.auth.job-seeker.signin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function jsPostRegistration(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        // ]);

        $data = $request->all();
        // dd($data);

        $createUser = $this->create($data, 1);
        // dd($createUser);

        $token = Str::random(64);

        UserVerify::create([
            'user_id' => $createUser->id,
            'token' => $token
        ]);

        // Mail::send('v1.careepick.pages.auth.emailVerificationEmail', ['token' => $token], function ($message) use ($request) {
        //     $message->to($request->email);
        //     $message->subject('Email Verification Mail');
        // });

        $mailData = [
            'token' => $token,
        ];
        Mail::to($request->email)->send(new VerifyEmail($mailData));

        return Redirect()->back()->with('registrationMessage', 'A verification mail has been sent to your email address, please confirm your mail account.');
        // dd("Email is sent successfully.");

        // return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function jsVerifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;
            // dd($user);

            if (!$user->email_verified_at) {
                $verifyUser->user->email_verified_at = Carbon::now()->getTimestamp();
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
                $user = User::where('id', $verifyUser->user_id)->first();
                Auth::login($user);
                return redirect()->route('js-dashboard')->with('message', "YO");
            } else {
                $message = "Your e-mail is already verified. You can now login.";
                $user = User::where('id', $verifyUser->user_id)->first();
                Auth::login($user);
                return redirect()->route('js-dashboard')->with('message', "YO");
            }
        }
        // dd($message);

        return redirect()->route('js-registration-page')->with('message', $message);
    }

    public function jsSignin(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Please Enter Your Email',
            'password.required' => 'Please Enter Your password',
        ]);

        // dd($request);

        $credentials = $request->only('email', 'password');
        // $token = auth()->attempt($credentials);

        // if (!$token) {
        //     return response()->json([
        //         'message' => 'Unauthorized',
        //     ], 401);
        // }

        try {
            if (Auth::attempt($credentials)) {
                // $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
                // $user = Auth::user();
                // $token = JWTAuth::fromUser($user);
                // $token = JWTAuth::attempt($credentials);
                // Log::debug($token);

                $userType = auth()->user()->user_type;

                if ($userType == 1) {
                    return redirect()->route('js-dashboard')->with('message', "YO");
                }

                // return $this->createNewToken($token);
            }
            return response()->json(['success' => false, 'message' => 'Login details are not valid'], 401);
        } catch (JWTException $e) {
            // Log::error($e);
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'message' => 'Could not create token'], 500);
        }
    }

    public function jsDetails()
    {
        return response()->json([
            'success' => true,
            'user' => Auth::user()
        ]);
    }

    public function jsDashboard()
    {
        if (Auth::check()) {
            return view('v1.careepick.dashboard.job-seeker.dashboard');
        }

        return redirect()->route("signin-page")->withSuccess('You are not allowed to access');
    }

    public function jsSignOut()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route("home");
    }

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function jpRegistrationPage(): view
    {
        return view('v1.careepick.pages.auth.job-provider.registar');
    }

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function signin(): view
    {
        return view('v1.careepick.pages.auth.signin');
    }

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function signup(): view
    {
        return view('v1.careepick.pages.auth.signup');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data, int $userType)
    {
        try {
            $user = null;

            DB::transaction(function () use ($data, $userType) {
                // First query: Create a new user
                $this->user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone_no' => $data['phone_no'],
                    'password' => Hash::make($data['password']),
                    'user_type' => $userType
                ]);

                // Second query: Create a new job seeker
                JobSeeker::create([
                    'user_id' => $this->user->id,
                    'jobseeker_name' => $data['name'],
                    'jobseeker_mail' => $data['email'],
                    'jobseeker_password' => Hash::make($data['password']),
                    'jobseeker_phone_no_1' => $data['phone_no'],
                ]);
            });

            // Both queries were successful
            // Commit the transaction
            DB::commit();

            return $this->user;
        } catch (\Exception $e) {
            // Something went wrong
            // Roll back the transaction
            DB::rollBack();
            Log::error($e);
        }
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => auth('api')->factory()->getTTL(), // get the token expiration time from config/jwt.php
            'user' => auth()->user()
        ]);
    }
}
