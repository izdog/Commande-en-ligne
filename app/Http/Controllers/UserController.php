<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Contracts\Auth\Guard;
use Symfony\Component\HttpFoundation\Request;


class UserController extends Controller
{
    private $auth;

    public function __construct(Guard $auth){
        $this->middleware('auth');
        $this->auth = $auth;
    }

    public function edit(){
        $categories = Category::all();
        $user = $this->auth->user();
        return view('user.userAccount', compact('user', 'categories'));
    }
    public function update(Request $request){
        $user = $this->auth->user();
        $this->validate($request, [
            'name' => 'required',
            'firstname' => 'required',
        ]);
        $user->update($request->only('firstname', 'name'));
        $user->save();
        return redirect()->back()->with('success', 'Vos informations personnelles ont bien été modifiées');
    }

}
