<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     */
    protected string $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /* check username or email */
    public function checkIdentity(): JsonResponse
    {
        try {
            $identity = Str::lower($_POST['identity']);
            if (filter_var($identity, FILTER_VALIDATE_INT) == true) {
                $fieldName = 'mobile_no';
            } elseif (filter_var($identity, FILTER_VALIDATE_EMAIL) == true) {
                $fieldName = 'email';
            } else {
                $fieldName = 'login_user_name';
            }
            request()->merge([$fieldName => $identity]);
            $user = User::where($fieldName, $identity)->first();
            $message = '';

            if (is_null($user)) {
                $message = trans('auth.username_or_email_does_not_exist');
            }
            if ($user) {
                if ($user->block_status == true) {
                    $message = trans('auth.authBlock');
                } elseif ($user->status == false) {
                    $message = trans('auth.authInactive');
                }
            }
            if ($message) {
                return response()->json([
                    'success' => false,
                    'message' => $message,
                ]);
            } else {
                return response()->json([
                    'success' => true,
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went to wrong',
            ], 500);
        }
    }

    /* Check user status (active or not) */
    protected function credentials(Request $request): array
    {
        return array_merge($request->only($this->username(), 'password'), ['status' => '1']);
    }

    /* post login form data */
    public function login(LoginRequest $request)
    {
        try {
            //set remember me function
            if ($request->rememberme === null) {
                setcookie('login_email', $request->identity, 100);
                setcookie('login_pass', $request->password, 100);
            } else {
                setcookie('login_email', $request->identity, time() + 60 * 60 * 24 * 100);
                setcookie('login_pass', $request->password, time() + 60 * 60 * 24 * 100);
            }
            //default validation check
            // $this->validateLogin($request);
            $user = User::where($this->username(), $request->identity)->first();
            if (isset($user)) {
                if (!Hash::check($request->password, $user->password)) {
                    $errors = [$this->username() => trans('auth.invalid_password')];

                    return redirect()->back()
                        ->withInput($request->only($this->username(), 'remember'))
                        ->withErrors($errors);
                }


                if ($user->status == false) {
                    $errors = [$this->username() => trans('auth.authInactive')];

                    return redirect()->back()
                        ->withInput($request->only($this->username(), 'remember'))
                        ->withErrors($errors);
                }

            } else {
                    $errors = [$this->username() => trans('auth.authUnknown')];

                    return redirect()->back()
                        ->withInput($request->only($this->username(), 'remember'))
                        ->withErrors($errors);
            }

            // If the class is using the ThrottlesLogins trait, we can automatically throttle
            // the login attempts for this application. We'll key this by the username and
            // the IP address of the client making these requests into this application.
            if ($this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);

                return $this->sendLockoutResponse($request);
            }
            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            }

            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
        } catch (Exception $e) {
            Session::flash('server_error', Lang::get('message.commons.technicalError'));

            return back();
        }
    }

    /* redirect log out route  */
    public function logout(Request $request): Redirector|Application|RedirectResponse
    {
        Auth::logout();

        $request->session()->flush();

        $request->session()->regenerate();
        session()->flash('success', trans('auth.login.logout_message'));

        return redirect(route('login'));
    }


    /* load login form*/
    public function showLoginForm(): Factory|View|Application
    {
        /* load data for request */
        $data['load_js'] = [
            'js/check_data.min.js',
        ];
        $data['script_js'] = "$(function(){
               $('.toggle-password').click(function () {

                $(this).toggleClass('fa-eye fa-eye-slash');
                var input = $($(this).attr('toggle'));
                if (input.attr('type') == 'password') {
                    input.attr('type', 'text');
                } else {
                    input.attr('type', 'password');
                }
            })
          $('#loginForm').validate({
                 rules: {
                     identity: {
                         required: true,
                     },
            
                 },
                 messages: {
                     identity: {
                         required: 'अंग्रेजी नाम  अनिवार्य छ ।',
                     },
            
                 },
                 errorElement: 'span',
                 errorPlacement: function (error, element) {
                     error.addClass('invalid-feedback');
                     element.closest('.form-group').append(error);
                 },
                 highlight: function (element, errorClass, validClass) {
                     $(element).addClass('is-invalid');
                 },
                 unhighlight: function (element, errorClass, validClass) {
                     $(element).removeClass('is-invalid');
                 }
                });
         })";

        return view('auth.login', $data);
    }

    public function username(): string
    {
        $identity = request()->get('identity');
        if (filter_var($identity, FILTER_VALIDATE_INT) == true) {
            $fieldName = 'mobile_no';
        } elseif (filter_var($identity, FILTER_VALIDATE_EMAIL) == true) {
            $fieldName = 'email';
        } else {
            $fieldName = 'login_user_name';
        }
        request()->merge([$fieldName => $identity]);

        return $fieldName;
    }
}
