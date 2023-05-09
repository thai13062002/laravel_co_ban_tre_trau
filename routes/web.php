<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeController;

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use  App\Models\User;
use App\Http\Controllers\DepartmentController;
use App\Models\Department;
use App\Http\Controllers\MailController;
use App\Models\Employe;
use Symfony\Component\Mailer\Test\Constraint\EmailCount;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test', [MailController::class,'test']);

Route::get('/', function () {
    return view('index');
})->name('index');
route::get('/login',function(){
    return view('login');
})->name('login');
route::post('/login',[AuthController::class,'checkLogin'])->name('checkLogin');
route::post('/logout',[AuthController::class,'logOut'])->name('logOut');

route::get('/forget-password',[UserController::class,'forgetPass'])->name('user.forgetPass');
route::post('/forget-password',[UserController::class,'postForgetPass']);

//đổi  password
route::group(['prefix'=>'user' ,'middleware'=>'auth'], function(){
    route::get('/changepassword', [UserController::class,'changePassword'])->name('user.changePassword');
    Route::post('/changePassword', [UserController::class,'activeChangePassword'])->name('user.activeChangePass');
    // route::get('/get-password/{user}/{token}',[MailController::class,'getPass'])->name('user.forgetPass');
    // route::post('/get-password/{user}/{token}',[MailController::class,'postGetPass']);

    // Route::get('/actived/{user}/{token}',[MailController::class,'actived'])->name('user.actived');
    // Route::post('/login', [MailController::class],'check_login');
    // Route::post('/changePassword', [MailController::class],'changePasswordr');
});


// route::get('/login',function(){
//     return view('login');
// })->name('login');






route::group(['prefix'=>'root','middleware'=>['auth', 'user-role:1', 'first-login']], function(){
    Route::get('/home', [HomeController::class, 'rootHome'])->name('rootHome');
    Route::resource('users', UserController::class)->except('destroy');
    Route::get('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::resource('departments', DepartmentController::class);
    Route::resource('employees', EmployeController::class);
    Route::post('/users/reset', [UserController::class, 'resetPasswords'])->name('root.reset');
    Route::get('information', [EmployeController::class,'rootInformation'])->name('root.information');
    Route::get('edit/information', [EmployeController::class,'rootEditinformation'])->name('root.editinformation');
    Route::post('edit/information', [EmployeController::class,'rootActioneditinformation'])->name('root.actioneditinformation');
});
route::group(['prefix'=>'employe','middleware'=>['auth', 'user-role:2', 'first-login']], function(){
    Route::get('/home', [HomeController::class, 'employeHome'])->name('employeHome');
    Route::get('information', [EmployeController::class,'information'])->name('employe.information');
    Route::get('edit/information', [EmployeController::class,'editinformation'])->name('employe.editinformation');
    Route::post('edit/information', [EmployeController::class,'actioneditinformation'])->name('employe.actioneditinformation');
    // Route::resource('user', UserController::class);
    route::group(['middleware'=>'check-manager'], function(){
        Route::get('list-employe', [EmployeController::class, 'listEmploye'])->name('employe.listEmploye');
    });

});

// fake-rootaccount
// route::get('/fake-user', function(){
//     $user = new User();
//     $user->role_id='1';
//     $user->name = 'thai';
//     $user->email = 'test@gmail.com';
//     $user->password = bcrypt('123456');
//     $user->first_login = '2';
//     $user->save();
// });



