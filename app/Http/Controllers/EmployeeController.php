<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->get();
        return view('backend.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            "name" => "required",
            "photo" => "required|mimes:jpeg,jpg,png",
            "email" => "required",
            "phone_number" => "required",
            "hire_date" => "required",
            "date_of_birth" => "required",
            "position" => "required",
            "department" => "required",
        ]);

        // upload file
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            // employeeimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('employeeimg', $fileName, 'public');

            // $path = '/storage/'.$filePath;
        }

        // data insert
        $employee = new Employee; // create new object
        $employee->name = $request->name;
        $employee->photo = $filePath;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->hire_date = $request->hire_date;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->position = $request->position;
        $employee->department = $request->department;
        $employee->save();

        // redirect
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('backend.employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        // validation
        $request->validate([
            "name" => "required",
            "photo" => "sometimes|mimes:jpeg,jpg,png",
            "email" => "required",
            "phone_number" => "required",
            "hire_date" => "required",
            "date_of_birth" => "required",
            "position" => "required",
            "department" => "required",
        ]);

        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            // employeeimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('employeeimg', $fileName, 'public');

            // condition file exist
            unlink(public_path('storage/').$employee->photo);
        }else{
            $filePath = $employee->photo;
        }

        // data insert
        $employee->name = $request->name;
        $employee->photo = $filePath;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->hire_date = $request->hire_date;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->position = $request->position;
        $employee->department = $request->department;
        $employee->save();

        // redirect
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index');
    }
}
