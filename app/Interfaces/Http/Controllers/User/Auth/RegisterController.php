<?php

namespace App\Interfaces\Http\Controllers\User\Auth;

use App\Interfaces\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Interfaces\Http\Requests\Auth\RegisterRequest;
use App\Core\Domain\Entities\UserEntity;
use App\Core\Application\Services\AuthService;
use App\Core\Application\Services\OtpService;
use App\Core\Application\Services\VerifyEmailService;
use App\Core\Domain\UseCase\OtpUseCase;
use App\Core\Domain\Usecase\RegisterUserUsecase;
use App\Infrastructure\Persistence\Models\Otp;
use App\Infrastructure\Persistence\Models\User;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected AuthService $authService;
    protected OtpService $OtpService;

    public function __construct(
        AuthService $authService,
        OtpService $OtpService
    ) {
        $this->authService = $authService;
        $this->OtpService = $OtpService;
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function showRegisterForm()
    {
        return view('user.auth.register');
    }

    // public function register(RegisterRequest $request)
    public function register(RegisterRequest $request)
    {
        $data = new UserEntity($request->validated());

        $data->account_type= 3;

        $user = $this->authService->register($data);
        $status = "verifi";
        $this->OtpService->sendOtp($user->email, $status);
        session(['otp_user_email' => $user->email]);

        return redirect()->route('user.otp.verify.form');

        // $useCase->execute($request->validated());
        // return view('auth.email-sent');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
}
