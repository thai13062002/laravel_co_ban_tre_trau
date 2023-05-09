<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    protected $authService;
    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }
    public function checkLogin(Request $request){
        $data=$request->all();
        if($this->authService->checkLogin($data))
        {
            // dd(Auth()->user());
            if (Auth()->user()->role_id=='1') {
                return redirect()->route('rootHome');
            }
            else{
                return redirect()->route('employeHome');
            }
        }
        return redirect()->route('login')->with('error', 'Email hoặc mật khẩu không chính xác');
    }
    public function logOut(){
        Auth::logout();
        return redirect()->route('login');
    }
}
