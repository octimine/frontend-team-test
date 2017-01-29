<?php

/**
 * @author : Harisankar.M.R <mrsank@live.in>
 * @date : 29.01.2016
 * @file: EmployeeController.php
 * @path: app/Http/Controllers/EmployeeController.php
 * @description: Controller
 */

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

/**
 * Class EmployeeController
 * @package App\Http\Controllers
 */
class EmployeeController extends Controller
{
    /**
     * Index function for employee data listing
     *
     * @param null $id
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        if ($id == null) {
            return Employee::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Function creates the new employee data in the table
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        Employee::create($request->all());
    }

    /**
     * Function fetch and display the employee data from the table
     *
     * @param  int $id
     * @return Employee|\Illuminate\Http\Response
     */
    public function show($id)
    {
        /** @var Employee $employee */
        $employee = Employee::find($id);
        return $employee;
    }

    /**
     * Function update the employee data in the table.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /** @var Employee $employee */
        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->employee_id = $request->input('employee_id');
        $employee->email = $request->input('email');
        $employee->branch = $request->input('branch');
        $employee->save();
    }

    /**
     * Function delete the employee data from the table.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);
    }
}
