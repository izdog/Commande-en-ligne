<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|alpha_num',
            'firstname' => 'required|max:255|alpha_num',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $token = str_random(60);

        $user = User::create([
            'name' => $data['name'],
            'firstname' => $data['firstname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirmation_token' => $token
        ]);
//        dd($this->mailer);
        $this->mailer->send(['text' => 'email.register'], compact('token', 'user'), function($message) use ($user){
            $message->to($user->email)->subject('Confirmation de votre compte');
        });
        return $user;
    }
    public function success(){
        $categories = Category::all();
        return view('auth.success', compact('categories'));
    }
    
}
