<?php

    namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
    use App\Providers\RouteServiceProvider;
    use App\User;
    use Illuminate\Foundation\Auth\RegistersUsers;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Validation\Rule;

    class RegisterController extends Controller {
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
        protected $redirectTo = RouteServiceProvider::EVAL;

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct() {
            $this->middleware('guest');
        }

        /**
         * Get a validator for an incoming registration request.
         *
         * @param  array  $data
         * @return \Illuminate\Contracts\Validation\Validator
         */
        protected function validator(array $data) {
            return Validator::make($data, [
                'name' => '',
                'dob' => ['required', 'date', 'before:16 years ago'],
                'genero' => ['required', 'alpha', Rule::in(['f', 'm', 'o', 'p'])],
                'pais' => ['required', 'string', 'max:255'],
                'ciudad' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'terminos' => ['required', 'accepted'],
            ]);
        }

        /**
         * Create a new user instance after a valid registration.
         *
         * @param  array  $data
         * @return \App\User
         */
        protected function create(array $data) {
            return User::create([
                'name' => 'anon',
                'dob' => $data['dob'],
                'genero' => $data['genero'],
                'pais' => $data['pais'],
                'ciudad' => $data['ciudad'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
    }
