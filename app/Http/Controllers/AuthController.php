<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function register(){
        return view("auth.register");
    }

    public function changePassword(){
        return view("auth.changePassword");
    }

    public function loginProcess(LoginRequest $request){
        $attempt = Auth::attempt([
            "username"  => $request->username,
            "password"  => $request->password,
            "is_active" => 1,
        ]);

        if($attempt){
            $request->session()->regenerate();
            Activity::write(ucfirst("login"));
            return redirect()->intended();
        } else {
            if(User::where("username", $request->username)->where("is_active", 1)->count("id") > 0){
                return redirect()->back()->with("fail", "Your password is wrong!");
            }
            if(User::where("username", $request->username)->where("is_active", 0)->count("id") > 0){
                return redirect()->back()->with("fail", "Your account is not activated!");
            }
            return redirect()->back()->with("fail", "Your credential is not found!");
        }
    }

    public function registerProcess(RegisterRequest $request){
        $role_id = Role::min("id");
        $password = bcrypt($request->password);
        $request->request->add([
            "password"  => $password,
            "role_id"   => $role_id,
        ]);
        User::create($request->all());
        return redirect("login")->with("success", "Your account is created. Please login!");
    }

    public function changePasswordProcess(Request $request){
        if($request->password == $request->password2){
            User::whereId(Auth()->user()->id)->update(["password" => bcrypt($request->password)]);
            Activity::write(ucfirst("change password"));
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect("login");
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request){
        Activity::write(ucfirst("logout"));
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("login");
    }
}
