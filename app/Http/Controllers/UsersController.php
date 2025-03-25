<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function addUser()
    {
        $departments = Department::all();
        return view('users/addUser', compact('departments'));
    }
    
    public function saveUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => 'nullable|string',
            'department_id' => 'nullable|exists:departments,id',
            'role' => 'required|in:admin,employee,user',
            
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'department_id' => $request->department_id,
            'is_active' => $request->is_active, // Will be 1 or 0
            'role' => $request->role
        ]);

        return redirect()->route('usersList')->with('success', 'User created successfully');
    }
    

    public function usersList()
    {
        return view('users/usersList');
    }

    public function employeesList()
    {
        return view('users/employeesList');
    }
    
    public function viewProfile($id)
    {
        $departments = Department::all();
        $user = User::findOrFail($id);
        return view('users/viewProfile', compact('user', 'departments'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $departments = Department::all();
        return view('users/editUser', compact('user', 'departments'));
    }
    
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'phone' => 'nullable|string',
            'department_id' => 'nullable|exists:departments,id',
            'role' => 'required|in:admin,employee,user',
        ]);

        if($request->password) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'department_id' => $request->department_id,
                'is_active' => $request->is_active,
                'role' => $request->role
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'department_id' => $request->department_id,
                'is_active' => $request->is_active,
                'role' => $request->role
            ]);
        }

      return redirect()->route('usersList')->with('success', 'User updated successfully');
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'password' => 'required|confirmed|string|min:8',
        ]);
        $user->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('viewProfile', $id)->with('success', 'Password updated successfully');
    }
    
    
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('usersList')->with('success', 'User deleted successfully');
    }   
    
}
