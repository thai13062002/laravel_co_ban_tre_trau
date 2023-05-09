<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\MailController;
use App\Mail\SendPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use App\Jobs\SendEmailJob;

class UserService
{

    public function createUser($data)
    {
        // // Validate data
        // $validatedData = validator($data, [
        //     'email' => 'required|string|max:255',
        //     'password' => 'nullable|string',
        //     'role' => 'required|min:0',
        //     'name' => 'required|min:0',
        // ])->validate();
        $user = new User();
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->role_id = $data['role_id'];
        $user->name = $data['name'];
        $user->first_login=1;
        // tạo đối tượng SendPasswordMail
        $mail = new SendPasswordMail($data['name'], $data['password']);
        // gửi email chứa mật khẩu đến người dùng
        Mail::to($data['email'])->send($mail);
        $user->save();
        return $user;
    }
    public function editUser($id)
    {
        $user = User::find($id);
        return $user;
    }
    public function updateUser($id, $data)
    {
        $user = User::find($id);
        if (!$user) {
            throw new \Exception("User not found");
        }
        $user->name = $data['name'];
        $user->role_id=$data['role_id'];
        $user->save();

        return $user;

    }
    public function destroyUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            throw new \Exception("User not found");
        }

        $user->delete();
    }
    public function changePassword($data){
        $user = Auth::user();
        if(!Hash::check($data['password_old'], $user->password))
        {
            return false;
        }
        $user_find=User::find($user->id);
        $user_find->password = Hash::make($data['password']);
        $user_find->first_login=2;
        $user_find->save();
        return $user_find;
    }
    public function forgetPass($data){
        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return false;
        }
        // Tạo mật khẩu ngẫu nhiên.
        $password = Str::random(8);

        // Cập nhật mật khẩu mới cho người dùng.
        $user->password = Hash::make($password);
        $user->first_login=1;
        $user->save();
        //Gửi email thôi nào
           // tạo đối tượng SendPasswordMail
           $mail = new SendPasswordMail($user->name, $password);
           // gửi email chứa mật khẩu đến người dùng
           Mail::to($data['email'])->send($mail);
        return true;
    }
    public function resetPasswords(array $users)
    {
        foreach ($users as $user) {
            $user = User::find($user);
            $password = Str::random(8);
            $user->password = bcrypt($password);
            $user->first_login=1;
            $sendEmailJob = new SendEmailJob($user->email,$password,$user->name); // dùng queue guir nhanh
            dispatch($sendEmailJob);
            // SendEmailJob::dispatch($user->name,$user->email,$password);
            // $mail = new SendPasswordMail($user->name, $password);
            // // gửi email chứa mật khẩu đến người dùng
            // Mail::to($user->email)->send($mail);
            $user->save();

            // Hoặc sử dụng delay để gửi email sau một khoảng thời gian
            // dispatch($sendEmailJob)->delay(now()->addSeconds(10));

        }

        // $user->password =bcrypt($newPassword); // Cập nhật mật khẩu mới cho user
        // $user->save();
        //    // tạo đối tượng SendPasswordMail
        //    $mail = new SendPasswordMail($user->name, $newPassword);
        //    // gửi email chứa mật khẩu đến người dùng
        //    Mail::to($user->email)->send($mail);
        // // Gửi email thông báo về việc reset mật khẩu
        // // Mail::to($user->email)->send(new PasswordResetNotification($user, $newPassword));
    }
    public function information(){
        $id=Auth::user()->id;
        $user = User::find($id); // Lấy ra user có id  đang đăng nhập
        $information= $user->employees;
        return $information;
    }
}
