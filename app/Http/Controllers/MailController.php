<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
// use App\Mail\SendPassword;
use App\Mail\SendPasswordMail;

class MailController extends Controller
{
    // public function test(){
    //     $name='Nguyeenx DDinh thai';
    //     Mail::send('email', compact('name'), function($email){
    //         $email->subject('demo email');
    //         $email->to('thai200210@gmail.com','Doi mat khau nha');
    //     });
    // }
    public function sendPassword(Request $request)
    {
        // lấy thông tin người dùng từ request
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        // tạo đối tượng SendPasswordMail
        $mail = new SendPasswordMail($name, $password); //kế thừa từ App\Mail\SendPasswordMail;

        // gửi email chứa mật khẩu đến người dùng
        Mail::to($email)->send($mail);

        // trả về thông báo cho người dùng
        //  return redirect()->back()->with('success', 'Mật khẩu đã được gửi đến email của bạn!');
    }
}
