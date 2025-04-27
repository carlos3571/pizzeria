<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $users = User::all();
        return view('employees.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'position' => 'required|in:cajero,administrador,cocinero,mensajero',
            'identification_number' => 'required|string|max:20',
            'salary' => 'required|numeric|min:0',
            'hire_date' => 'required|date',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Empleado creado exitosamente.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $users = User::all();
        return view('employees.edit', compact('employee', 'users'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'position' => 'required|in:cajero,administrador,cocinero,mensajero',
            'identification_number' => 'required|string|max:20',
            'salary' => 'required|numeric|min:0',
            'hire_date' => 'required|date',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}
