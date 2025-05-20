<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Response;
use Illuminate\Http\Request;
use App\Models\employee;

class employeecontroller extends Controller
{
    public function index()
    {   
        $employees = employee::get();
        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        $employees = employee::all(); // MUST be here
        return view('employee.create', compact('employees'));
    }


    public function store(Request $request)
    {
        $request->validate([
        'fname' => 'required|max:255|string',
        'lname' => 'required|max:255|string',
        'address' => 'required|max:255|string',
        'phone' => 'required|digits:11|string',
    ]);

    employee::create($request->all());

    // Get updated employees list
    $employees = employee::all();

    return view('employee.create', compact('employees'))->with('status', 'Employee Created!');
    }

    public function edit( int $id)
    {
        $employees = employee::find($id);
        return view ('employee.edit',compact('employees'));
    }

    public function update(Request $request, int $id) {
        {
            $request->validate([
                'fname' => 'required|max:255|string',
                'lname' => 'required|max:255|string',
                'address' => 'required|max:255|string',
                'phone' => 'required|digits:11|string',
                
            ]);
        
            employee::findOrFail($id)->update($request->all());
            return redirect ()->back()->with('status','Employee Updated Successfully!');
            }
    }

    public function destroy(int $id){
        $employees = employee::findOrFail($id);
        $employees->delete();
        return redirect ()->back()->with('status','Employee Deleted');
    }
}
