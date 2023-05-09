<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestPassword;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $userService;
    // public function __construct(UserService $userService)
    // {
    //     $this->userService = $userService;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('rootaccount.account', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rootaccount.add_account');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->userService->createUser($request->all());
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = $this->userService->editUser($id);
        return view('rootaccount.edit_account', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->userService->updateUser($id, $data);
        return redirect()->route('users.index')->with('success', 'User has been update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userService->destroyUser($id);
        return redirect()->route('users.index')->with('success', 'User has been deleted successfully!');
    }


    public function changePassword()
    {
        return view('changePassword');
    }
    public function activeChangePassword(RequestPassword $requestPassword)
    {
        $data = $requestPassword->all();
        if ($this->userService->changePassword($data) == false) {
            return redirect()->back()->withErrors(['current_password' => 'Incorrect current password']);
        }
        $user = $this->userService->changePassword($data);
        if ($user->role_id == 1) {
            return redirect()->route('rootHome')->with('success', 'Đổi mật khẩu thành công.');
        } else {
            return redirect()->route('employeHome')->with('success', 'Đổi mật khẩu thành công.');
        }
    }
    public function forgetPass()
    {
        return view('reset_password');
    }
    public function postForgetPass(Request $request)
    {
        if ($this->userService->forgetPass($request->all())) {
            return redirect()->route('login')->with('success-resetpass', 'Mật khẩu đã được gửi đến email của bạn!');
        } else {
            return redirect()->back()->with('error', 'Email bạn không hợp lệ');
        }
    }
    public function resetPasswords(Request $request)
    {
        $users = $request->input('users');
        $this->userService->resetPasswords($users);
        return redirect()->route('users.index')->with('success', 'User has been reset successfully!');
    }
}
