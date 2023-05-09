<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
Use app\Mail\SendPasswordMail;
use App\Mail\test;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $name;

    protected $email;
    protected $password;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $password, $name)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            // $user = User::find($this->email); // Tìm user theo ID
            // if (!$user) {
            //     continue; // Nếu không tìm thấy user thì bỏ qua
            // }
            // echo $this->email;

            try {
                $mail = new test($this->name, $this->password);
            // gửi email chứa mật khẩu đến người dùng
                Mail::to($this->email)->send($mail);
            } catch (\Exception $e) {
                Log::error('Error sending email: ' . $e->getMessage());
                throw $e;
            }
    }
}
