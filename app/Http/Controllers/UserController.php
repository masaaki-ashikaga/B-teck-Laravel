<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function login(){
        return view('users.login');
    }

    public function register(){
        return view('users.register');
    }

    public function home(UserRequest $request){

        // $validate_rule = [
        //     'name' => 'required|string',
        //     'mail' => 'required|email',
        //     'pass' => 'required|size:7',
        //     'conf_pass' => 'required|same:pass',
        // ];

        //$this->validate($request, $validate_rule);
        $name = $request->name;
        return view('users/home', ['name' => $name]);
    }
}
