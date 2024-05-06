<?php

namespace App\Http\Controllers\v1\JobProvider;

Use File;
use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\View\View;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\v1\careepick\Year;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\v1\careepick\Country;
use App\Models\v1\careepick\Upazila;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\v1\careepick\District;
use Illuminate\Support\Facades\Session;
use App\Models\v1\careepick\EmployeeSize;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\v1\careepick\EmploymentType;
use App\Http\Requests\JobProvider\JobProviderRequest;
use App\Models\v1\careepick\Recruiter\Company;

class AuthController extends Controller
{
    private $user = [];

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function jpRegistrationPage(): view
    {
        $employeeSizeData = EmployeeSize::select("*")->get();
        $employmentTypeData = EmploymentType::all();
        $yearsData = Year::select("*")->get();
        $countryData = Country::select("*")->get();
        $districtData = District::select("*")->get();
        $upazilaData = Upazila::select("*")->get();
        $data = [
            'employeeSizeData' => $employeeSizeData,
            'employmentTypeData' => $employmentTypeData,
            'yearsData' => $yearsData,
            'countryData' => $countryData,
            'districtData' => $districtData,
            'upazilaData' => $upazilaData,
        ];

        return view('v1.careepick.pages.auth.job-provider.registar', $data);
    }

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function jpSigninPage(): view
    {
        return view('v1.careepick.pages.auth.job-provider.signin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function jpPostRegistration(Request $request)
    {
        try {
            // dd($request);
            $formRequest = new JobProviderRequest();
            $requestData = $request->except('_token', 'method_type');
            // Validate the incoming request with the rules defined in rulesForCreate() method
            $validator = Validator::make($requestData, $formRequest->rulesForCreate(), $formRequest->messages());

            // Check if validation fails
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $request->all();
            // dd($data);

            $createUser = $this->createUser($data, 2);
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

            // $mailData = [
            //     'token' => $token,
            // ];
            // Mail::to($request->email)->send(new VerifyEmail($mailData));

            return Redirect()->route('jp-signin-page')->with('registrationMessage', 'You have been registered, please signin to your account.');
            return Redirect()->back()->with('registrationMessage', 'A verification mail has been sent to your email address, please confirm your mail account.');
            // dd("Email is sent successfully.");

            // return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Fetch expected data
     *
     * @param Request $request
     */
    public function jpValidation(Request $request)
    {
        try {
            $response = $this->ajaxValidation($request);
            return response()->json($response);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Perform AJAX validation for a single input
     *
     * @return array
     */
    private function ajaxValidation($request): array
    {
        $rules = [];
        $messages = [];
        $fieldName = $request->field;
        $value = $request->value;
        $methodTypeValue = $request->methodTypeValue;

        // Instantiate the form request class based on the specified $requestClass
        $formRequest = new JobProviderRequest();
        if ($methodTypeValue === 'create') {
            if (method_exists($formRequest, 'rulesForCreate')) {
                // Get the validation rules for the specified field
                $rules = $formRequest->rulesForCreate();

                // Get the specific rule for the field
                $fieldRules = $rules[$fieldName] ?? [];

                // Create a temporary array with the validation rules for the specified field
                $tempRules = [$fieldName => $fieldRules];
            }
        } elseif ($methodTypeValue === 'update') {
            if (method_exists($formRequest, 'rulesForUpdate')) {
                // Get the validation rules for the specified field
                $rules = $formRequest->rulesForUpdate();

                // Get the specific rule for the field
                $fieldRules = $rules[$fieldName] ?? [];

                // Create a temporary array with the validation rules for the specified field
                $tempRules = [$fieldName => $fieldRules];
            }
        } else {
            if (method_exists($formRequest, 'rules')) {
                // Get the validation rules for the specified field
                $rules = $formRequest->rules();

                // Get the specific rule for the field
                $fieldRules = $rules[$fieldName] ?? [];

                // Create a temporary array with the validation rules for the specified field
                $tempRules = [$fieldName => $fieldRules];
            }
        }

        if (method_exists($formRequest, 'messages')) {
            // Get the validation messages for the specified field
            $messages = $formRequest->messages();
        }


        // Create a validator instance for the specified field
        $validator = Validator::make([$fieldName => $value], $tempRules, $messages);

        // Check if the validation fails
        if ($validator->fails()) {
            $errors = $validator->errors();

            $result = ['success' => false, 'errors' => $errors];
        } else {
            $result = ['success' => true];
        }

        // return response
        return $result;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function jpVerifyAccount($token)
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
                return redirect()->route('jp-dashboard')->with('message', "YO");
            } else {
                $message = "Your e-mail is already verified. You can now login.";
                $user = User::where('id', $verifyUser->user_id)->first();
                Auth::login($user);
                return redirect()->route('jp-dashboard')->with('message', "YO");
            }
        }
        // dd($message);

        return redirect()->route('jp-registration-page')->with('message', $message);
    }

    public function jpSignin(Request $request)
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

                if ($userType == 2) {
                    return redirect()->route('jp-dashboard')->with('message', "YO");
                }
                // return $this->createNewToken($token);
            }
            return Redirect()->back()->with('signinErrorMessage', 'Incorrect username or password');
            return response()->json(['success' => false, 'message' => 'Login details are not valid'], 401);
        } catch (JWTException $e) {
            // Log::error($e);
            Log::error($e->getMessage());
            // return response()->json(['success' => false, 'message' => 'Could not create token'], 500);
        }
    }

    public function jpDetails()
    {
        return response()->json([
            'success' => true,
            'user' => Auth::user()
        ]);
    }

    public function jpDashboard()
    {
        if (Auth::check()) {
            return view('v1.careepick.dashboard.job-provider.dashboard');
        }

        return redirect()->route("jp-signin-page")->withSuccess('You are not allowed to access');
    }

    public function jpSignOut()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route("home");
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function createUser(array $data, int $userType)
    {
        try {
            $user = null;

            DB::transaction(function () use ($data, $userType) {
                // First query: Create a new user
                $this->user = User::create([
                    'name' => $data['company_name'],
                    'email' => $data['company_mail'],
                    'phone_no' => $data['company_phone_no_1'],
                    'password' => Hash::make($data['company_password']),
                    'user_type' => $userType
                ]);

                // dd($this->user);
                // dd($data);

                $data['user_id'] = $this->user['id'];
                $data['company_status'] = 2;
                $data['slug'] = $this->generateSlug($data['company_name']);

                unset($data['_token']);
                unset($data['method_type']);
                $data['company_password'] = Hash::make($data['company_password']);

                if (array_key_exists('company_logo', $data)) {
                    $file = $data['company_logo'];
                    $filePath = $this->getPathForUploadedFile($file);
                    $data['company_logo'] = $filePath;
                }

                if (array_key_exists('company_trade_license_document', $data)) {
                    $file = $data['company_trade_license_document'];
                    $filePath = $this->getPathForUploadedFile($file);
                    $data['company_trade_license_document'] = $filePath;
                }

                // dd($data);

                // Instantiate a new Company model
                $company = new Company();

                // Fill the model with data from the $data array
                $company->fill($data);

                // Save the model to persist the data in the database
                $company->save();
                // dd($company);
            });

            // Both queries were successful
            // Commit the transaction
            DB::commit();

            return $this->user;
        } catch (\Exception $e) {
            // Something went wrong, so Roll back the transaction
            DB::rollBack();
            Log::error($e);
        }
    }

    /**
     * Get path for uploaded files
     *
     * @param object $file
     * @return string
     */
    private function getPathForUploadedFile(object $file): string
    {
        $fileExtension = $file->extension();
        $fileExtension = strtolower($file->getClientOriginalExtension());
        $fileName = "profile_image." . $fileExtension;

        $path = public_path('dashboard/assets/images/job-provider/' . $this->user['id']);

        $this->createDirectory($path);

        // ResizeImage::make($file)->resize(300, 200)->save(public_path($filePath));
        if ($file->move($path, $fileName)) {
            $filePath = 'dashboard/assets/images/job-provider/' . $this->user['id'] . '/' . $fileName;
        }

        return $filePath;
    }

    /**
     * Create directory if not exist
     *
     * @param string $path
     * @return void
     */
    private function createDirectory(string $path): void
    {
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
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

    /**
     * Generate slug
     *
     * @param string $value
     * @return string
     */
    private function generateSlug(string $value): string
    {
        $slug = Str::slug($value);
        // dd($slug,"show");

        if (Company::where('slug', Str::slug($value))->exists()) {
            $original = $slug;

            $count = 1;

            while (Company::where('slug', $slug)->exists()) {
                $slug = "{$original}-" . $count++;
            }

            return $slug;
        }
        return $slug;
    }
}
