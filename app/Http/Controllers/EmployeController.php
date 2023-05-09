<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\User;
use App\Models\Department;
use App\Services\EmployeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    protected $employeService;
    public function __construct(EmployeService $employeService)
    {
        $this->employeService = $employeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employe::all();

        return view('rootaccount.employe.employees_list',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $departments=Department::all();
        return view('rootaccount.employe.form_add_employe', compact('users','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->employeService->createEmploye($request->all());
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results=$this->employeService->editEmploye($id);
        $employe=$results[0];
        $departments=$results[1];
        return view('rootaccount.employe.form_edit_employe',compact('employe','departments'));
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
        $data=$request->all();
        $this->employeService->updateEmploye($id,$data);
        return redirect()->route('employees.index')->with('success', 'Employe has been update successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->employeService->destroyEmploye($id);
        return redirect()->route('employees.index')->with('success', 'Employe has been deleted successfully!');
    }
    public function rootInformation()
    {
        $information = $this->employeService->information();
        return view('rootaccount.information', compact('information'));
    }
    public function rootEditinformation(){
        $information = $this->employeService->information();
        return view('rootaccount.edit_information', compact('information'));
    }
    public function rootActioneditinformation(Request $request){
        $data=$request->all();
        $id=Auth::user()->id;
        $this->employeService->updateInformation($id,$data);
        return redirect()->route('root.information')->with('success', 'User has been update successfully!');
    }


    public function listEmploye(){
        $employees = $this->employeService->listEmploye();
        return view('employeaccount.list_employees',compact('employees'));
    }









    public function information()
    {
        $information = $this->employeService->information();
        return view('employeaccount.information', compact('information'));
    }
    public function editinformation(){
        $information = $this->employeService->information();
        return view('employeaccount.edit_information', compact('information'));
    }
    public function actioneditinformation(Request $request){
        $data=$request->all();
        $id=Auth::user()->id;
        $this->employeService->updateInformation($id,$data);
        return redirect()->route('employe.information')->with('success', 'User has been update successfully!');
    }
}
