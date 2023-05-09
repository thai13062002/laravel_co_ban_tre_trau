<?php
namespace App\Services;

use App\Models\Department;
use Illuminate\Support\Facades\Auth;


class DepartmentService
{
    public function createDepartment($data)
    {
        // // Validate data
        // $validatedData = validator($data, [
        //     'email' => 'required|string|max:255',
        //     'password' => 'nullable|string',
        //     'role' => 'required|min:0',
        //     'name' => 'required|min:0',
        // ])->validate();
        $department = new Department();
        $department->name = $data['name'];

        $department->save();
        return $department;
    }
    public function editDepartment($id)
    {
        $department = Department::find($id);
        return $department;
    }
    public function updateDepartment($id, $data)
    {
        $department = Department::find($id);
        if (!$department) {
            throw new \Exception("Department not found");
        }
        $department->name = $data['name'];
        $department->save();
        return $department;
    }
    public function destroyDepartment($id)
    {
        $department = Department::find($id);

        if (!$department) {
            throw new \Exception("Department not found");
        }
        $department->delete();
    }
}
