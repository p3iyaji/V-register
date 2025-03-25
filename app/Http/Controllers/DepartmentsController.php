<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department   ;

class DepartmentsController extends Controller
{

    public function addDepartment()
    {
        return view('departments/addDepartment');
    }
    
    public function saveDepartment(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments,name',
        ]);
        
        $department = new Department();
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();
        
        return redirect()->route('departmentsList')->with('success', 'Department added successfully');
    }   
    
    public function departmentsList()
    {
        return view('departments/departmentsList');
    }
    
    public function editDepartment($id)
    {
        $department = Department::findOrFail($id);
        return view('departments/editDepartment', compact('department'));
    }
    
    public function updateDepartment(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $department = Department::findOrFail($id);
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();
        
        return redirect()->route('departmentsList')->with('success', 'Department updated successfully');
    }
    
    public function deleteDepartment($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        
        return redirect()->route('departmentsList')->with('success', 'Department deleted successfully');
    }   
    
}
