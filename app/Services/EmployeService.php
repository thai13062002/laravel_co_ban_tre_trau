<?php
namespace App\Services;

use App\Models\Employe;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Echo_;

class EmployeService
{
    public function createEmploye($data)
    {
        // // Validate data
        // $validatedData = validator($data, [
        //     'email' => 'required|string|max:255',
        //     'password' => 'nullable|string',
        //     'role' => 'required|min:0',
        //     'name' => 'required|min:0',
        // ])->validate();
        $employe = new Employe();
        $employe->name = $data['name'];
        $employe->user_id = $data['user_id'];
        $employe->department_id = $data['department_id'];
        $employe->position = $data['position'];
        $employe->address = $data['address'];
        $employe->sex = $data['sex'];
        $employe->birthday=$data['birthday'];
        $employe->save();
        return $employe;
    }
    public function editEmploye($id)
    {
        $departments=Department::all();
        $employe = Employe::find($id);
        return [$employe, $departments];
    }
    public function updateEmploye($id, $data)
    {
        $employe = Employe::find($id);
        if (!$employe) {
            throw new \Exception("Employe not found");
        }
        $employe->name = $data['name'];
        $employe->user_id = $data['user_id'];
        $employe->department_id = $data['department_id'];
        $employe->position = $data['position'];
        $employe->address = $data['address'];
        $employe->sex = $data['sex'];
        $employe->birthday=$data['birthday'];
        $employe->save();

        return $employe;

    }
    public function destroyEmploye($id)
    {
        $employe = Employe::find($id);

        if (!$employe) {
            throw new \Exception("Employe not found");
        }

        $employe->delete();
    }
    public function information(){
        $id=Auth::user()->id;
        $user = User::find($id); // Lấy ra user có id  đang đăng nhập
        $information= $user->employees;
        return $information;
    }
    public function updateInformation($id, $data)
    {
        $employe = Employe::where('user_id',$id)->first();
        if (!$employe) {
            throw new \Exception("User not found");
        }
        $employe->name = $data['name'];
        $employe->address = $data['address'];
        $employe->sex = $data['sex'];
        $employe->birthday = $data['birthday'];



        $employe->save();

        return $employe;
    }

    public function listEmploye(){
        $id=Auth::user()->id;
        $employe = Employe::where('user_id',$id)->first(); // trưởng phognf đăng nhập
        $dempartment_id = $employe->department_id;
        $employees= Employe::where('department_id','=',$dempartment_id)->where('position','!=','manager')->get();
        return $employees;
    }
}
